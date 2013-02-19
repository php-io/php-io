<?php

namespace Gplanchat\Io\Loop;

use Gplanchat\Io\Loop\LoopInterface;

class Loop
    implements LoopInterface
{
    private static $defaultInstance = null;

    private $loop = null;

    public static function getDefaultInstance()
    {
        if (self::$defaultInstance === null) {
            self::$defaultInstance = new static();
            self::$defaultInstance->loop = \uv_default_loop();
        }
    }

    /**
     * @return LoopInterface
     */
    public function init()
    {
        $this->loop = \uv_loop_new();

        return $this;
    }

    /**
     * @return LoopInterface
     */
    public function cleanup()
    {
        \uv_loop_delete($this->loop);

        return $this;
    }

    /**
     * @return LoopInterface
     */
    public function run()
    {
        \uv_run($this->loop);

        return $this;
    }

    /**
     * @return LoopInterface
     */
    public function runOnce()
    {
        \uv_runonce($this->loop);

        return $this;
    }

    /**
     * @return LoopInterface
     */
    public function stop()
    {
        \uv_kill($this->loop);

        return $this;
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->loop;
    }
}
