<?php

namespace Gplanchat\Io\Net\Udp;

use Gplanchat\ServiceManager\ServiceManagerInterface;

class SocketFactory
{
    public function __invoke(ServiceManagerInterface $serviceManager, array $moreParams = [])
    {
        $host = $moreParams[0];

        if (filter_var($host, FILTER_VALIDATE_IP | FILTER_FLAG_IPV6)) {
            return $serviceManager->get('UdpIp6Socket', $moreParams);
        }

        return $serviceManager->get('UdpIp4Socket', $moreParams);
    }
}
