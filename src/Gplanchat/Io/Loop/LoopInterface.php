<?php

namespace Gplanchat\Io\Loop;

interface LoopInterface
{
    /**
     * Initialize the loop
     *
     * @return LoopInterface
     */
    public function init();

    /**
     * Cleans up the loop
     *
     * @return LoopInterface
     */
    public function cleanup();

    /**
     * Runs the loop infinitely
     *
     * @return LoopInterface
     */
    public function run();

    /**
     * Runs the loop only once
     *
     * @return LoopInterface
     */
    public function runOnce();

    /**
     * Stops the loop (mainly in case the loop would have been run infinitely)
     *
     * @param int|null $signal
     * @return LoopInterface
     */
    public function stop($signal = null);

    /**
     * Returns the uv_loop, for direct operations on the loop
     *
     * @return resource
     */
    public function getResource();
}
