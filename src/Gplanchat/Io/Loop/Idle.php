<?php

namespace Gplanchat\Io\Loop;

class Idle
{
    /**
     * @var resource
     */
    private $idler = null;

    /**
     * @param Loop $loop
     */
    public function __construct(Loop $loop)
    {
        $this->idler = \uv_idle_init($loop->getResource());
    }

    /**
     * @param callable $callback
     * @return Timer
     */
    public function start(callable $callback)
    {
        \uv_idle_start($this->idler, $callback);

        return $this;
    }

    /**
     * @return Timer
     */
    public function stop()
    {
        \uv_timer_stop($this->idler);

        return $this;
    }
}
