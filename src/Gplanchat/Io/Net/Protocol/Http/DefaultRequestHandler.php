<?php
/**
 * This file is part of Gplanchat\Io.
 *
 * Gplanchat\Io is free software: you can redistribute it and/or modify it under the
 * terms of the GNU LEsser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Gplanchat\Io is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Gplanchat\Io.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Grégory PLANCHAT <g.planchat@gmail.com>
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @copyright Copyright (c) 2013 Grégory PLANCHAT (http://planchat.fr/)
 */

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\Io\Net\Protocol\RequestInterface;
use Gplanchat\Io\Net\Protocol\ResponseInterface;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\EventManager\EventEmitterTrait;
use Gplanchat\EventManager\Event;
use Gplanchat\EventManager\CallbackHandlerInterface;
use Gplanchat\Io\Net\Protocol\RequestHandlerInterface;
use Gplanchat\Io\Net\Tcp\ClientInterface;
use Psr\Log\LogLevel;

/**
 * Class DefaultRequestHandler
 * @package Gplanchat\Io\Net\Protocol\Http
 * @mathod getProtocolUpgrader()
 */
class DefaultRequestHandler
    implements ServiceManagerAwareInterface, RequestHandlerInterface
{
    use ServiceManagerAwareTrait;
    use EventEmitterTrait;

    /**
     * @var CallbackHandlerInterface
     */
    private $callbackHanlder = null;

    /**
     * @param ServiceManagerInterface $serviceManager
     */
    public function __construct(ServiceManagerInterface $serviceManager)
    {
        $this->setServiceManager($serviceManager);
    }

    /**
     * @param CallbackHandlerInterface $callbackHanlder
     * @return $this|RequestHandlerInterface
     */
    public function setCallbackHandler(CallbackHandlerInterface $callbackHanlder)
    {
        $this->callbackHanlder = $callbackHanlder;

        return $this;
    }

    /**
     * @return CallbackHandlerInterface
     */
    public function getCallbackHandler()
    {
        return $this->callbackHanlder;
    }

    /**
     * @param Event $event
     * @param ClientInterface $client
     * @param string $buffer
     * @param int $length
     * @param bool $isError
     * @return RequestHandlerInterface
     */
    public function __invoke(Event $event, ClientInterface $client, $buffer, $length, $isError)
    {
        echo 'HTTP: Analyzing TCP request.' . PHP_EOL;

        if ($isError) {
            $response = (new Response())
                ->setReturnCode(500, 'Internal Server Error')
                ->setBody('Server Error')
                ->setHeader('Connection', 'close')
            ;

            $this->emit(new Event('error'), [$response, 500, LogLevel::ERROR]);

            $response->send($client);

            return $this;
        }

        if (($request = $this->initRequest($client, $buffer, $length)) === null) {
            return $this;
        }

        if (($response = $this->initResponse($client)) === null) {
            return $this;
        }

        if ($this->setupUpgrades($client, $request, $response)) {
            return $this;
        }

        $response->on(['ready'], function(Event $event) use($client, $request) {
            /** @var ResponseInterface $response */
            $response = $event->getEventEmitter();

            $response->send($client);
        });

        // FIXME: what if the request was chunked?
        // FIXME: what if the request does not close after response?
        $this->emit(new Event('request'), [$client, $request, $response]);

        return $this;
    }

    /**
     * @param ClientInterface $client
     * @param string $buffer
     * @param int $length
     * @return Request
     */
    public function initRequest(ClientInterface $client, $buffer, $length)
    {
        /** @var ServiceManagerInterface $serviceManager */
        $serviceManager = $this->getServiceManager();

        try {
            /** @var RequestInterface $request */
            $request = $serviceManager->get('Request', [
                'client' => $client,
                'buffer' => $buffer,
                'length' => $length
                ])
            ;
        } catch (Exception\UnexpectedValueException $e) {
            /** @var ResponseInterface $response */
            $response = $serviceManager->get('Response', ['client' => $client])
                ->setReturnCode(400, 'Bad Request')
                ->setBody('Bad Request')
                ->setHeader('Connection', 'close')
            ;

            $this->emit(new Event('error'), [$response, 400, LogLevel::DEBUG, $e]);

            $response->send($client);

            echo $e . PHP_EOL;

            return null;
        } catch (Exception\BadRequestException $e) {
            /** @var ResponseInterface $response */
            $response = $serviceManager->get('Response', ['client' => $client])
                ->setReturnCode(500, 'Internal Server Error')
                ->setBody('Server Error')
                ->setHeader('Connection', 'close')
            ;

            $this->emit(new Event('error'), [$response, 500, LogLevel::INFO, $e]);

            $response->send($client);

            echo $e . PHP_EOL;

            return null;
        } catch (\RuntimeException $e) {
            /** @var ResponseInterface $response */
            $response = $serviceManager->get('Response', ['client' => $client])
                ->setReturnCode(500, 'Internal Server Error')
                ->setBody('Server Error')
                ->setHeader('Connection', 'close')
            ;

            $this->emit(new Event('error'), [$response, 500, LogLevel::WARNING, $e]);

            $response->send($client);

            echo $e . PHP_EOL;

            return null;
        } catch (\Exception $e) {
            /** @var ResponseInterface $response */
            $response = $serviceManager->get('Response', ['client' => $client])
                ->setReturnCode(417, 'Expectation Failed')
                ->setBody('Expectation Failed')
                ->setHeader('Connection', 'close')
            ;

            $this->emit(new Event('error'), [$response, 417, LogLevel::ERROR, $e]);

            $response->send($client);

            echo $e . PHP_EOL;

            return null;
        }

        return $request;
    }

    /**
     * @param ClientInterface $client
     * @return Response|null
     */
    public function initResponse(ClientInterface $client)
    {
        try {
            /** @var Response $response */
            $response = $this->getServiceManager()->get('Response');
        } catch (\Exception $e) {
            $response = (new Response())
                ->setReturnCode(417, 'Expectation Failed')
                ->setBody('Expectation Failed')
                ->setHeader('Connection', 'close')
            ;

            $this->emit(new Event('error'), [$response, 417, LogLevel::ERROR, $e]);

            $response->send($client);

            return null;
        }

        return $response;
    }

    /**
     * @param ClientInterface $client
     * @param Request $request
     * @param Response $response
     * @return bool
     */
    public function setupUpgrades(ClientInterface $client, Request $request, Response $response)
    {
        if (($upgrade = $request->getHeader('UPGRADE')) === null) {
            return false;
        }

        $sm = $this->getServiceManager();
        /** @var ProtocolUpgrader $protocolUpgrader */
        if (($protocolUpgrader = $sm->get('ProtocolUpgrader', [$sm], true)) === null) {
            return false;
        }

        $upgrade = strtolower($upgrade);
        try {
            $protocolUpgrader->upgrade($upgrade, $this->getCallbackHandler(), $client, $request, $response);
        } catch (Exception\UnsupportedUpgradeException $e) {
            $response
                ->setReturnCode(505, 'HTTP Version Not Supported')
                ->setBody('Expectation Failed')
                ->setHeader('Connection', 'close')
            ;

            $this->emit(new Event('error'), [$response, 505, LogLevel::ERROR, $e]);

            $response->send($client);
        } catch (Exception\BadRequestException $e) {
            $response
                ->setReturnCode(400, 'Bad Request')
                ->setBody('Bad Request')
                ->setHeader('Connection', 'close')
            ;

            $this->emit(new Event('error'), [$response, 400, LogLevel::ERROR, $e]);

            $response->send($client);
        }

        return true;
    }
}
