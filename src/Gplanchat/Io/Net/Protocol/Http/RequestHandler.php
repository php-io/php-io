<?php

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\ServiceManager\ServiceManagerTrait;
use Gplanchat\EventManager\EventEmitterInterface;
use Gplanchat\EventManager\EventEmitterTrait;
use Gplanchat\EventManager\Event;
use Gplanchat\Io\Net\Protocol\RequestHandlerInterface;
use Gplanchat\Io\Net\ClientInterface;
use RuntimeException;
use ArrayObject;

class RequestHandler
    implements ServiceManagerInterface, RequestHandlerInterface, EventEmitterInterface
{
    use ServiceManagerTrait;
    use EventEmitterTrait;

    const VERSION_HTTP10 = 'Http10';
    const VERSION_HTTP11 = 'Http11';

    public function __construct()
    {
        $this->registerSingleton('Http10', __NAMESPACE__ . '\\ProtocolVersion\\Http10');
        $this->registerSingleton('Http11', __NAMESPACE__ . '\\ProtocolVersion\\Http11');

        $this->registerInvokable('Response', __NAMESPACE__ . '\\Response');
        $this->registerInvokable('Request', __NAMESPACE__ . '\\Request');
    }

    /**
     * @param ClientInterface $client
     * @param string $buffer
     * @param int $length
     * @param bool $isError
     * @throws RuntimeException
     * @return Request|null
     */
    public function __invoke(Event $event, ClientInterface $client, $buffer, $length, $isError)
    {
        $parserHandle = \uv_http_parser_init(\UV::HTTP_REQUEST);

        $result = [];
        if (!\uv_http_parser_execute($parserHandle, $buffer, $result)) {
            $response = new Response();
            $response->setReturnCode(500, 'Internal Server Error');
            $response->setBody('Server Error');
            $response->send($client);
            return;
        }

        if (!isset($result['REQUEST_METHOD']) || !isset($result['PATH'])) {
            $response = new Response();
            $response->setReturnCode(400, 'Bad Request');
            $response->setBody('Bad Request');
            $response->send($client);
            return;
        }

        $request = new Request($result['REQUEST_METHOD'], $result['PATH']);

        if (strtoupper($result['REQUEST_METHOD']) != 'GET' && isset($result['HEADERS']) && isset($result['HEADERS']['BODY'])) {
            $postData = [];
            parse_str($result['HEADERS']['BODY'], $postData);

            $request->setPostParams(new ArrayObject($postData));
        }

        if (isset($result['QUERY'])) {
            $queryData = [];
            parse_str($result['HEADERS']['BODY'], $queryData);

            $request->setQueryParams(new ArrayObject($queryData));
        }

        if (isset($result['HEADERS']) && isset($result['HEADERS']['COOKIE'])) {
            $cookieData = [];
            parse_str($result['HEADERS']['COOKIE'], $cookieData);

            $request->setCookieParams(new ArrayObject($cookieData));
        }

        $response = new Response();

        $requestHandler = $this;
        $response->on(['ready'], function(Event $event) use($client, $requestHandler, $request) {
            $response = $event->getData('eventEmitter');

            $this->emit(new Event('afterRequestProcessing'), [$request, $response]);

            $response->send($client);
        });

        $this->emit($event = new Event('beforeRequestProcessing'), [$request, $response]);
        if ($event->getData('isError')) {
            $response->emit(new Event('ready'));
            return;
        }

        $this->emit(new Event('request'), [$client, $request, $response]);
    }
}
