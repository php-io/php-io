<?php

namespace Gplanchat\Io\Loop;

interface LoopInterface
{
    /**
     * @return LoopInterface
     */
    public function init();

    /**
     * @return LoopInterface
     */
    public function cleanup();

    /**
     * @return LoopInterface
     */
    public function run();

    /**
     * @return LoopInterface
     */
    public function runOnce();

    /**
     * @return LoopInterface
     */
    public function stop();

    /**
     * @return resource
     */
    public function getResource();
}
