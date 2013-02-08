<?php

namespace Gplanchat\Stream;

trait StreamTrait
{
    private $context = null;
    /**
     * @var resource|null
     */
    private $handle = null;

    public function __construct(array $contextOptions = [], array $contextParams = [])
    {
        $this->context = stream_context_create($contextOptions, $contextParams);
    }

    public function open($url, callable $callback)
    {
        if ($this->handle !== null) {
            throw new \RuntimeException('Stream already open.');
        }
        $this->handle = fopen($url, 'rb+');

        return $this;
    }

    /**
     *
     */
    public function close(callable $callback)
    {
        if ($this->handle !== null) {
            fclose($this->handle);
            $this->handle = null;
        }

        return $this;
    }

    /**
     * @param string $rawData
     */
    public function read($rawData, callable $callback)
    {
        return $this;
    }

    /**
     * @param string $rawData
     */
    public function write($rawData, callable $callback)
    {
        return $this;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function setContextOptions(array $contextOptions)
    {
        foreach ($contextOptions as $wrapper => $optionList) {
            if (!is_array($optionList) || !is_string($wrapper)) {
                continue;
            }

            foreach ($optionList as $option => $value) {
                stream_context_set_option($this->handle, $wrapper, $option, $value);
            }
        }

        return $this;
    }

    public function getContextOptions()
    {
        return stream_context_get_options($this->context);
    }

    public function setContextParams(array $contextParams)
    {
        stream_context_set_params($this->context, $contextParams);

        return $this;
    }

    public function getContextParams()
    {
        return stream_context_get_params($this->context);
    }
}

