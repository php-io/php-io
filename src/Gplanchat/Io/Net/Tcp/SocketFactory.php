<?php

namespace Gplanchat\Io\Net\Tcp;

use Gplanchat\ServiceManager\ServiceManagerInterface;

class SocketFactory
{
    public function __invoke(ServiceManagerInterface $serviceManager, array $moreParams = [])
    {
        $host = $moreParams[0];

        if (filter_var($host, FILTER_VALIDATE_IP | FILTER_FLAG_IPV6)) {
            return $serviceManager->get('TcpIp6Socket', $moreParams);
        }

        return $serviceManager->get('TcpIp4Socket', $moreParams);
    }
}
