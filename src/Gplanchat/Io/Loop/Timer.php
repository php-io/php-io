<?php

namespace Gplanchat\Io\Loop;

class Timer
{
    private $timer = null;

    /**
     * @param Loop $loop
     */
    public function __construct(Loop $loop)
    {
        $this->timer = \uv_timer_init($loop->getResource());
    }

    /**
     * @param int $timeout
     * @param callable $callback
     * @return Timer
     */
    public function timeout($timeout, callable $callback)
    {
        \uv_timer_start($this->timer, $timeout, 0, $callback);

        return $this;
    }

    /**
     * @param int $timeout
     * @param callable $callback
     * @return Timer
     */
    public function interval($timeout, callable $callback)
    {
        \uv_timer_start($this->timer, $timeout, $timeout, $callback);

        return $this;
    }

    /**
     * @param int $startTimeout
     * @param int $repeatTimeout
     * @param callable $callback
     * @return Timer
     */
    public function repeater($startTimeout, $repeatTimeout, callable $callback)
    {
        \uv_timer_start($this->timer, $startTimeout, $repeatTimeout, $callback);

        return $this;
    }

    /**
     * @return Timer
     */
    public function repeat()
    {
        \uv_timer_again($this->timer);

        return $this;
    }

    /**
     * @param int $timeout
     * @return Timer
     */
    public function setRepeatTimeout($timeout)
    {
        \uv_timer_set_repeat($this->timer, $timeout);

        return $this;
    }

    /**
     * @return Timer
     */
    public function stop()
    {
        \uv_timer_stop($this->timer);

        return $this;
    }
}

