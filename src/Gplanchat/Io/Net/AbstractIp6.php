<?php

namespace Gplanchat\Io\Net;

use Gplanchat\Io\Net\SocketTrait;

abstract class AbstractIp6
    implements SocketInterface
{
    use SocketTrait;

    /**
     * @param string $address
     * @param int $port
     * @param string $transport
     * @param resource|null $context
     */
    public function __construct($address, $port, $transport = self::TRANSPORT_TCP, $context = null)
    {
        $this->socket = \uv_ip6_addr($address, $port);
        $this->port = $port;
        $this->transport = $transport;
        $this->context = $context;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return \uv_ip6_name($this->socket);
    }
}
