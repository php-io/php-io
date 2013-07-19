<?php

namespace Gplanchat\Io\Net\Tcp\Plugin;

use Gplanchat\Io\Application\Application;
use Gplanchat\Io\Application\Plugin\PluginInterface;
use Gplanchat\Io\Application\Plugin\PluginTrait;
use Gplanchat\Io\Exception\InvalidDependencyException;
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
        }
        if ($requestHandler !== null) {
            $this->setRequestHandler($requestHandler);
        }
    }

    /**
     * @param PluginManagerInterface $application
     * @throws InvalidDependencyException
     * @return $this
     */
    public function register(PluginManagerInterface $application)
    {
        if (!$application instanceof Application) {
            throw new InvalidDependencyException('This plugin could only be registered onto an application.');
        }

        $this->setApplication($application);

        if ($this->getServiceManager() === null) {
            $this->setServiceManager($this->getApplication()->getServiceManager());
        }

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
        $host = array_shift($params);
        $port = array_shift($params);

        $socket = $this->getServiceManager()->get('TcpSocket', [$host, $port]);

        if (($server = $this->getApplication()->getStorage($namespace)) === null) {
            /** @var \Gplanchat\Io\Net\Tcp\ServerInterface $server */
            $server = $this->getServiceManager()
                ->get('TcpServer', [$this->getServiceManager(), $this->getApplication()->getCurrentLoop(), $socket]);

            $this->getApplication()->setStorage($namespace, $server);
        } else {
            $server->registerSocket($socket);
        }
    }
}
