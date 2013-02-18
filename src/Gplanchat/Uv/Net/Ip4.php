<?php

namespace Gplanchat\Uv\Net;

class Ip4
    implements SocketInterface
{
    protected $socket = null;

    /**
     * @return resource
     */
    public function __construct($address, $port)
    {
        $this->socket = \uv_ip4_addr($address, $port);
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
        return \uv_ip4_name($this->socket);
    }
}
