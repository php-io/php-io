<?php

namespace Gplanchat\Io\Net\Protocol\Http\Plugin;

use Gplanchat\Io\Net\Protocol\Http\Plugin\ServerPluginInterface;
use Gplanchat\Io\Net\Protocol\Http\Plugin\ServerPluginTrait;
use Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface;
use Gplanchat\Io\Net\Protocol\Http\Server;
use Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket\RequestHandlerFactory;
use Gplanchat\PluginManager\PluginAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;

class WebSocket
    implements ServerPluginInterface, ServiceManagerAwareInterface
{
    use ServerPluginTrait;
    use ServiceManagerAwareTrait;

    private $requestHandler = null;

    /**
     * @param ServiceManagerInterface $serviceManager
     * @param callable $requestHandler
     */
    public function __construct(ServiceManagerInterface $serviceManager, callable $requestHandler)
    {
        $this->setRequestHandler($requestHandler);
        $this->setServiceManager($serviceManager);
    }

    /**
     * @param PluginAwareInterface $server
     * @return ServerPluginInterface
     */
    public function register(PluginAwareInterface $server)
    {
        $this->setServer($server);

        /** @var ProtocolUpgraderInterface $protocolUpgrader */
        $protocolUpgrader = $this->getServer()
            ->getServiceManager()
            ->get('ProtocolUpgrader')
        ;

        $protocolUpgrader
            ->registerFactory('WebSocket', new RequestHandlerFactory($this->getServiceManager(), $this->getRequestHandler()))
            ->registerAlias('websocket', 'WebSocket')
        ;

        return $this;
    }

    /**
     * @param callable $requestHandler
     * @return ServerPluginInterface
     */
    public function setRequestHandler(callable $requestHandler)
    {
        $this->requestHandler = $requestHandler;

        /** @var Server $server */
        $server = $this->getServer();

        if ($server !== null) {
            /** @var RequestHandlerFactory $factory */
            $factory = $server->getServiceManager()
                ->get('ProtocolUpgrader')
                ->getFactory('WebSocket')
            ;

            $factory->setCallback($requestHandler);
        }

        return $this;
    }

    /**
     * @return callable
     */
    public function getRequestHandler()
    {
        return $this->requestHandler;
    }
}
