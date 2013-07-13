<?php

namespace Gplanchat\Io\Net\Tcp;

use Gplanchat\ServiceManager\ServiceManagerInterface;

class SocketFactory
{
    public function __invoke(ServiceManagerInterface $serviceManager, array $moreParams = [])
    {
        $host = array_shift($moreParams);
        $port = array_shift($moreParams);

        if (filter_var($host, FILTER_VALIDATE_IP | FILTER_FLAG_IPV6)) {
            return $serviceManager->get('TcpIp6Socket', [$host, $port]);
        }

        return $serviceManager->get('TcpIp4Socket', [$host, $port]);
    }
}
