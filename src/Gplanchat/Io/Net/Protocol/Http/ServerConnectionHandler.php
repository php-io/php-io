<?php

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface;
use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;
use Gplanchat\EventManager\Event;
use Psr\Log\LoggerInterface;
use Gplanchat\Log\LoggerAwareInterface;
use Gplanchat\Log\LoggerAwareTrait;
use Gplanchat\Log\Writer\Stream;

class ServerConnectionHandler
    implements ServiceManagerAwareInterface, ConnectionHandlerInterface, LoggerAwareInterface
{
    use ServiceManagerAwareTrait;
    use LoggerAwareTrait;

    private $callback = null;

    /**
     * @param callable $callback
     * @param ServiceManagerInterface $serviceManager
     * @throws Exception\RuntimeException
     */
    public function __construct(ServiceManagerInterface $serviceManager, callable $callback)
    {
        $this->setServiceManager($serviceManager);
        $this->setLogger($this->getServiceManager()->get('Logger'));

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
        $requestHandler = $this->getServiceManager()
            ->get('RequestHandler', [$this->getServiceManager()])
        ;
        $client->on(['data'], $requestHandler);

        $requestHandler->on(['request'], $this->callback);

        return $requestHandler;
    }
}
