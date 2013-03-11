<?php

namespace Gplanchat\Io\Net;

use Gplanchat\Io\Net\SocketInterface;
use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;

trait SocketTrait
{
    private $socket = null;
    private $port = 0;
    private $transport = null;
    private $context = null;

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
        return sprintf('%s://%s:%d', $this->getTransport(), $this->getAddress(), $this->getPort());
    }

    /**
     * @return string
     */
    public function toStreamString()
    {
        return sprintf('%s://%s', $this->getTransport(), $this->getAddress());
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @return resource
     */
    public function getContext()
    {
        if ($this->context === null) {
            $this->context = \stream_context_create();
        }

        return $this->context;
    }

    /**
     * @param string $option
     * @param mixed $value
     * @param string|null $wrapper
     * @return SocketInterface
     */
    public function setContextOption($option, $value, $wrapper = null)
    {
        \stream_context_set_option($this->getContext(), $wrapper ?: $this->getTransport(), $option, $value);

        return $this;
    }

    /**
     * @param string $param
     * @param mixed $value
     * @return SocketInterface
     */
    public function setContextParam($param, $value)
    {
        \stream_context_set_params($this->getContext(), [$param => $value]);
    }
}
