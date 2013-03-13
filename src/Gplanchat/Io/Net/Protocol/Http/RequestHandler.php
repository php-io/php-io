<?php

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\ServiceManager\ServiceManagerTrait;
use Gplanchat\EventManager\EventEmitterInterface;
use Gplanchat\EventManager\EventEmitterTrait;
use Gplanchat\EventManager\Event;
use Gplanchat\Io\Net\Protocol\RequestHandlerInterface;
use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Log\Logger;
use Psr\Log\LogLevel;

class RequestHandler
    implements ServiceManagerInterface, RequestHandlerInterface, EventEmitterInterface
{
    use ServiceManagerTrait;
    use EventEmitterTrait;

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
            $this->get('Logger')->log(LogLevel::ERROR, sprintf('%s encountered an error.', __METHOD__));

            (new Response())
                ->setReturnCode(500, 'Internal Server Error')
                ->setBody('Server Error')
                ->setHeader('Connection', 'close')
                ->send($client)
            ;

            return $this;
        }

        try {
            /** @var Request $request */
            $request = $this->get('Request', ['client' => $client, 'buffer' => $buffer, 'length' => $length]);
        } catch (Exception\UnexpectedValueException $e) {
            $this->get('Logger')->log(LogLevel::ERROR, $e->getMessage());

            (new Response())
                ->setReturnCode(400, 'Bad Request')
                ->setBody('Bad Request')
                ->setHeader('Connection', 'close')
                ->send($client)
            ;

            return $this;
        } catch (Exception\BadRequestException $e) {
            $this->get('Logger')->log(LogLevel::ERROR, $e->getMessage());

            (new Response())
                ->setReturnCode(500, 'Internal Server Error')
                ->setBody('Server Error')
                ->setHeader('Connection', 'close')
                ->send($client)
            ;

            return $this;
        } catch (\Exception $e) {
            $this->get('Logger')->log(LogLevel::ERROR, $e->getMessage());

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
            $response = $this->get('Response');
        } catch (\Exception $e) {
            $this->get('Logger')->log(LogLevel::ERROR, $e->getMessage());

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

            $this->emit(new Event('afterRequestProcessing'), [$request, $response]);

            $response->send($client);
        });

        $this->emit($event = new Event('beforeRequestProcessing'), [$request, $response]);
        if ($event->getData('isError')) {
            $response->emit(new Event('ready'));
            return $this;
        }

        $this->emit(new Event('request'), [$client, $request, $response]);

        return $this;
    }
}
