<?php

namespace Gplanchat\Uv\Net;

interface SocketInterface
{
    /**
     * @return resource
     */
    public function getResource();

    /**
     * @return string
     */
    public function __toString();
}
