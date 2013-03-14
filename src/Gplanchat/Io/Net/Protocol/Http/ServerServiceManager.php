<?php

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\ServiceManager\ServiceManager;
use Gplanchat\ServiceManager\Configurator;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class ServerServiceManager
    extends ServiceManager
{
    /**
     * @param array $config
     * @param Configurator $configurator
     * @param LoggerInterface $logger
     */
    public function __construct(array $config = null, Configurator $configurator = null, LoggerInterface $logger = null)
    {
        if ($config === null) {
            $config = [
                'invokables' => [
                    'RequestHandler' => __NAMESPACE__ . '\\RequestHandler'
                ],
                'singletons' => [
                    'ServerConnectionHandler' => __NAMESPACE__ . '\\ServerConnectionHandler'
                    ],
                'alias'      => [],
                'factories'  => [
                    'Request'  => new RequestFactory(),
                    'Response' => new ResponseFactory()
                    ]
                ];
        }

        if ($configurator === null) {
            $configurator = new Configurator();
        }

        $configurator($this, $config);

        if (!$this->has('Logger')) {
            if ($logger === null) {
                $logger = new NullLogger();
            }

            $this->registerSingleton('Logger', $logger);
        }
    }
}
