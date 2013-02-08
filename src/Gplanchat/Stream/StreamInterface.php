<?php

namespace Gplanchat\Stream;

interface StreamInterface
{
    /**
     * @param string $url
     * @return StreamInterface
     */
    public function open($url, callable $callback);

    /**
     * @return StreamInterface
     */
    public function close(callable $callback);

    /**
     * @param string $rawData
     * @param int|null $length
     * @return StreamInterface
     */
    public function read($rawData, $length, callable $callback);

    /**
     * @param string $rawData
     * @return StreamInterface
     */
    public function write($rawData, callable $callback);

    /**
     * @return resource
     */
    public function getContext();

    /**
     * @param array $contextOptions
     * @return StreamInterface
     */
    public function setContextOptions(array $contextOptions);

    /**
     * @return StreamInterface
     */
    public function getContextOptions();

    /**
     * @param array $contextParams
     * @return StreamInterface
     */
    public function setContextParams(array $contextParams);

    /**
     * @return StreamInterface
     */
    public function getContextParams();
}

