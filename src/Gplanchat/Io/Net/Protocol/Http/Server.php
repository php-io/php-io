<?php

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\Io\Net\Tcp;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\ServiceManager\Configurator;

class Server
    extends Tcp\Server
{
    public function listen($timeout, callable $callback)
    {
        /** @var ServerConnectionHandler $connectionHandler */
        $connectionHandler = $this->getServiceManager()->get('ServerConnectionHandler', [$this->getServiceManager(), $callback]);

        return parent::listen($timeout, $connectionHandler);
    }
}
