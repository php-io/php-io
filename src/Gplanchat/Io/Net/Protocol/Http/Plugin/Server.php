<?php

namespace Gplanchat\Io\Net\Protocol\Http\Plugin;

use Gplanchat\Io\Application\Plugin\PluginInterface;
use Gplanchat\Io\Application\Plugin\PluginTrait;
use Gplanchat\Io\Net\Protocol\Http;
use Gplanchat\Io\Net\Tcp\ServerInterface;
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
    public function __construct(callable $requestHandler = null, ServiceManagerInterface $serviceManager = null)
    {
        if ($serviceManager !== null) {
            $this->setServiceManager($serviceManager);
        } else {
            $this->setServiceManager(new Http\ServerServiceManager());
        }

        if ($requestHandler !== null) {
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
        $tcpServer = array_shift($params);
        $timeout = array_shift($params);

        if (!is_int($timeout) || $timeout <= 0) {
            $timeout = 200;
        }

        if (is_string($tcpServer)) {
            $tcpServer = $this->getApplication()->getStorage($tcpServer);
        } else if (!$tcpServer instanceof ServerInterface) {
            return;
        }

        $httpServer = $this->getServiceManager()
            ->get('HttpServer', [$this->getServiceManager(), $tcpServer]);
        ;

        $httpServer->listen($timeout, $this->getRequestHandler());

        $this->getApplication()->setStorage($namespace, $httpServer);
    }
}
