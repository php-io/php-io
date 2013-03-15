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

use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\EventManager\EventEmitterTrait;
use Gplanchat\EventManager\Event;
use Gplanchat\EventManager\CallbackHandler;
use Gplanchat\Io\Net\Protocol\RequestHandlerInterface;
use Gplanchat\Io\Net\ClientInterface;
use Psr\Log\LoggerInterface;
use Gplanchat\Log\LoggerAwareInterface;
use Gplanchat\Log\LoggerAwareTrait;
use Psr\Log\LogLevel;

class DefaultRequestHandler
    implements ServiceManagerAwareInterface, RequestHandlerInterface, LoggerAwareInterface
{
    use ServiceManagerAwareTrait;
    use EventEmitterTrait;
    use LoggerAwareTrait;

    /**
     * @var CallbackHandler
     */
    private $callbackHanlder = null;

    public function __construct(ServiceManagerInterface $serviceManager)
    {
        $this->setServiceManager($serviceManager);

        $this->setLogger($this->getServiceManager()->get('Logger'));
    }

    public function setCallbackHanlder(CallbackHandler $callbackHanlder)
    {
        $this->callbackHanlder = $callbackHanlder;

        return $this;
    }

    public function getCallbackHanlder()
    {
        return $this->callbackHanlder;
    }

    /**
     * @param ClientInterface $client
     * @param string $buffer
     * @param int $length
     * @param bool $isError
     * @return RequestHandlerInterface
     */
    public function __invoke(Event $event, ClientInterface $client, $buffer, $length, $isError)
    {
        if ($isError) {
            $this->getLogger()->log(LogLevel::ERROR, sprintf('%s encountered an error.', __METHOD__));

            (new Response())
                ->setReturnCode(500, 'Internal Server Error')
                ->setBody('Server Error')
                ->setHeader('Connection', 'close')
                ->send($client)
            ;

            return $this;
        }

        /** @var ServiceManagerInterface $serviceManager */
        $serviceManager = $this->getServiceManager();
        try {
            /** @var Request $request */
            $request = $serviceManager->get('Request', ['client' => $client, 'buffer' => $buffer, 'length' => $length]);
        } catch (Exception\UnexpectedValueException $e) {
            $this->getLogger()->log(LogLevel::ERROR, $e->getMessage());

            (new Response())
                ->setReturnCode(400, 'Bad Request')
                ->setBody('Bad Request')
                ->setHeader('Connection', 'close')
                ->send($client)
            ;

            return $this;
        } catch (Exception\BadRequestException $e) {
            $this->getLogger()->log(LogLevel::ERROR, $e->getMessage());

            (new Response())
                ->setReturnCode(500, 'Internal Server Error')
                ->setBody('Server Error')
                ->setHeader('Connection', 'close')
                ->send($client)
            ;

            return $this;
        } catch (\Exception $e) {
            $this->getLogger()->log(LogLevel::ERROR, $e->getMessage());

            (new Response())
                ->setReturnCode(417, 'Expectation Failed')
                ->setBody('Expectation Failed')
                ->setHeader('Connection', 'close')
                ->send($client)
            ;

            return $this;
        }

        try {
            /** @var response $response */
            $response = $serviceManager->get('Response');
        } catch (\Exception $e) {
            $this->getLogger()->log(LogLevel::ERROR, $e->getMessage());

            (new Response())
                ->setReturnCode(417, 'Expectation Failed')
                ->setBody('Expectation Failed')
                ->setHeader('Connection', 'close')
                ->send($client)
            ;

            return $this;
        }

        $response->on(['ready'], function(Event $event) use($client, $request) {
            $response = $event->getData('eventEmitter');

            $response->send($client);
        });

        if (($upgrade = $request->getHeader('UPGRADE')) !== null) {
            /** @var ProtocolUpgrader $protocolUpgrader */
            $protocolUpgrader = $this->get('ProtocolUpgrader');

            $upgrade = strtolower($upgrade);
            if (!$protocolUpgrader->upgrade($upgrade, $this->getCallbackHanlder())) {
                $this->getLogger()->log(LogLevel::INFO, sprintf('Protocol upgrade "%s" not supported.', $upgrade));

                (new Response())
                    ->setReturnCode(505, 'HTTP Version Not Supported')
                    ->setBody('Expectation Failed')
                    ->setHeader('Connection', 'close')
                    ->send($client)
                ;
            }

            return $this;
        }

        // FIXME: what if the request was chunked?
        // FIXME: what if the request does not close after response?
        $this->emit(new Event('request'), [$client, $request, $response]);

        return $this;
    }
}
