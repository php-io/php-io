<?php

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\ServiceManager\ServiceManagerTrait;
use Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface;
use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;
use Gplanchat\EventManager\Event;
use Gplanchat\Log\Logger;
use Gplanchat\Log\Writer\Stream;
use RuntimeException;

class ServerConnectionHandler
    implements ServiceManagerInterface, ConnectionHandlerInterface
{
    use ServiceManagerTrait;

    private $callback = null;

    /**
     * @param callable $callback
     * @param string|null $requestHandlerClass
     */
    public function __construct(callable $callback, $requestHandlerClass = null)
    {
        if ($requestHandlerClass === null) {
            $requestHandlerClass = __NAMESPACE__ . '\\RequestHandler';
        }

        $this->registerInvokable('RequestHandler', $requestHandlerClass);

        $this->registerSingleton('Logger', new Logger(new Stream('http.log')));

        $this->callback = $callback;
    }

    /**
     * @param Event $event
     * @param ClientInterface $client
     * @param ServerInterface $server
     * @return callable
     */
    public function __invoke(Event $event, ClientInterface $client, ServerInterface $server)
    {
        /** @var RequestHandler $requestHandler */
        $requestHandler = $this->get('RequestHandler');
        $client->on(['data'], $requestHandler);

        $requestHandler->registerSingleton('Logger', $this->get('Logger'));
        $requestHandler->registerFactory('Response', new ResponseFactory());
        $requestHandler->registerFactory('Request', new RequestFactory());

        $requestHandler->on(['request'], $this->callback);

        return $requestHandler;
    }
}
