<?php

namespace Gplanchat\Io\Application\Plugin;

use Gplanchat\PluginManager\PluginInterface as BasePluginInterface;
use Gplanchat\PluginManager\PluginManagerInterface;
use Gplanchat\Log;

class Logger
    implements BasePluginInterface
{
    private $logger = null;

    public function __construct()
    {
        $writer = new Log\Writer\Stream('php://stdout');
        $this->logger = new Log\Logger($writer);
    }

    /**
     * @param string $namespace
     * @param array $params
     * @return mixed
     */
    public function __invoke($namespace, array $params = [])
    {
        list($response, $responseCode, $logLevel, $e) = $params;

        $this->logger->log($logLevel, $e->getMessage());
    }

    /**
     * @param PluginManagerInterface $application
     * @return $this
     */
    public function register(PluginManagerInterface $application)
    {
        return $this;
    }
}
