<?php

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\ServiceManager\ServiceManagerTrait;
use Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface;
use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;
use Gplanchat\EventManager\Event;
use RuntimeException;

class ConnectionHandler
    implements ServiceManagerInterface, ConnectionHandlerInterface
{
    use ServiceManagerTrait;

    const VERSION_HTTP10 = 'Http10';
    const VERSION_HTTP11 = 'Http11';

    private $callback = null;

    public function __construct(callable $callback)
    {
        $this->registerInvokable('RequestHandler', __NAMESPACE__ . '\\RequestHandler');

        $this->callback = $callback;
    }

    /**
     * @param ClientInterface $client
     * @param ServerInterface $server
     * @return callable
     */
    public function __invoke(Event $event, ClientInterface $client, ServerInterface $server)
    {
        $requestHandler = $this->get('RequestHandler');
        $client->on(['data'], $requestHandler);

        $requestHandler->on(['request'], $this->callback);

        return $requestHandler;
    }
}
