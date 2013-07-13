<?php

namespace Gplanchat\Io\Net\Tcp\Plugin;

use Gplanchat\Io\Application\Plugin\PluginInterface;
use Gplanchat\Io\Application\Plugin\PluginTrait;
use Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket\RequestHandlerFactory;
use Gplanchat\PluginManager\PluginManagerInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;

class Server
    implements PluginInterface, ServiceManagerAwareInterface
{
    use PluginTrait;
    use ServiceManagerAwareTrait;

    private $requestHandler = null;

    /**
     * @param ServiceManagerInterface $serviceManager
     * @param callable $requestHandler
     */
    public function __construct(ServiceManagerInterface $serviceManager = null, callable $requestHandler = null)
    {
        if ($serviceManager === null) {
            $this->setServiceManager($serviceManager);
        }
        if ($requestHandler === null) {
            $this->setRequestHandler($requestHandler);
        }
    }

    /**
     * @param PluginManagerInterface $application
     * @return $this
     */
    public function register(PluginManagerInterface $application)
    {
        $this->setApplication($application);

        return $this;
    }

    /**
     * @param callable $requestHandler
     * @return $this
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

    /**
     * @param string $namespace
     * @param array $params
     * @return mixed
     */
    public function __invoke($namespace, array $params = [])
    {

    }
}
