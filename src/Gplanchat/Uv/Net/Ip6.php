<?php

namespace Gplanchat\Uv\Net;

class Ip6
    implements SocketInterface
{
    protected $socket = null;

    /**
     * @return resource
     */
    public function __construct($address, $port)
    {
        $this->address = $address;
        $this->port = $port;

        $this->socket = \uv_ip6_addr($address, $port);
    }
    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->socket;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return \uv_ip6_name($this->socket);
    }
}
