<?php

namespace Gplanchat\Io\Net;

use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;

interface SocketInterface
{
    const TRANSPORT_TCP = 'tcp';
    const TRANSPORT_UDP = 'udp';
    const TRANSPORT_TLS = 'tls';
    const TRANSPORT_SSl = 'ssl';

    /**
     * @return resource
     */
    public function getResource();

    /**
     * @return string
     */
    public function __toString();

    /**
     * @return string
     */
    public function toStreamString();

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @return int
     */
    public function getPort();

    /**
     * @return string
     */
    public function getTransport();

    /**
     * @return resource
     */
    public function getContext();

    /**
     * @param string $option
     * @param mixed $value
     * @param string|null $wrapper
     * @return SocketInterface
     */
    public function setContextOption($option, $value, $wrapper = null);

    /**
     * @param string $param
     * @param mixed $value
     * @return SocketInterface
     */
    public function setContextParam($param, $value);

    /**
     * @param ClientInterface $client
     * @param $callback
     * @return SocketInterface
     */
    public function connect(ClientInterface $client, callable $callback);

    /**
     * @param ServerInterface $server
     * @return SocketInterface
     */
    public function bind(ServerInterface $server);
}
