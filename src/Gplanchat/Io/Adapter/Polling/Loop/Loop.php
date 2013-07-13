<?php
/**
 * This file is part of Gplanchat\Io.
 *
 * Gplanchat\Io is free software: you can redistribute it and/or modify it under the
 * terms of the GNU LEsser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Gplanchat\Io is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Gplanchat\Io.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Grégory PLANCHAT <g.planchat@gmail.com>
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @copyright Copyright (c) 2013 Grégory PLANCHAT (http://planchat.fr/)
 */
namespace Gplanchat\Io\Adapter\Polling\Loop;

use Gplanchat\Io\Loop\LoopInterface;

/**
 * Basic loop class. A loop is designed to run event-driven code, the loop runs
 * until there are registered I/O loops.
 *
 * @package    Gplanchat\Io
 * @subpackage Gplanchat\Io\Loop
 */
class Loop
    implements LoopInterface
{
    /**
     * @var array
     */
    private $readStreams = [];

    /**
     * @var array
     */
    private $writeStreams = [];

    /**
     * @var array
     */
    private $readListeners = [];

    /**
     * @var array
     */
    private $writeListeners = [];

    /**
     * @var bool
     */
    private $stopped = false;

    /**
     * @var Poller
     */
    private $poller = null;

    /**
     *
     */
    public function __construct()
    {
        $this->poller = new Poller($this);
    }

    public function __destruct()
    {
        $this->stop();
        $this->cleanup();
    }

    /**
     * Initialize the loop
     *
     * @return LoopInterface
     */
    public function init()
    {
        return $this;
    }

    /**
     * Cleans up the loop
     *
     * @return LoopInterface
     */
    public function cleanup()
    {
        $this->readListeners = [];
        $this->readStreams = [];
        $this->writeListeners = [];
        $this->writeStreams = [];

        return $this;
    }

    /**
     * Runs the loop infinitely
     *
     * @return LoopInterface
     */
    public function run()
    {
        $this->stopped = false;

        while (true) {
            $this->runOnce();

            if ($this->stopped === true) {
                break;
            }

            $this->poller->tick();
        }

        return $this;
    }

    /**
     * Runs the loop only once
     *
     * @return LoopInterface
     */
    public function runOnce()
    {
        $read = $this->readStreams ?: null;
        $write = $this->writeStreams ?: null;
        $except = null;

        if (empty($read) && empty($write)) {
            return $this;
        }

        if (stream_select($read, $write, $except, 0, $this->getNextEventTime()) > 0) {
            if ($read) {
                foreach ($read as $stream) {
                    if (!isset($this->readListeners[(int) $stream])) {
                        continue;
                    }

                    $listener = $this->readListeners[(int) $stream];
                    if (call_user_func($listener, $stream, $this) === false) {
                        $this->removeReadStream($stream);
                    }
                }
            }

            if ($write) {
                foreach ($write as $stream) {
                    if (!isset($this->writeListeners[(int) $stream])) {
                        continue;
                    }

                    $listener = $this->writeListeners[(int) $stream];
                    if (call_user_func($listener, $stream, $this) === false) {
                        $this->removeWriteStream($stream);
                    }
                }
            }
        }

        return $this;
    }

    /**
     * Stops the loop (mainly in case the loop would have been run infinitely)
     *
     * @param int|null $signal
     * @return LoopInterface
     */
    public function stop($signal = null)
    {
        $this->stopped = true;

        return $this;
    }

    /**
     * @param $stream
     * @param callable $callback
     * @return $this
     */
    public function addReadStream($stream, callable $callback)
    {
        $id = (int) $stream;

        if (!isset($this->readStreams[$id])) {
            $this->readStreams[$id] = $stream;
            $this->readListeners[$id] = $callback;
        }

        return $this;
    }

    /**
     * @param $stream
     * @param $listener
     * @return $this
     */
    public function addWriteStream($stream, $listener)
    {
        $id = (int) $stream;

        if (!isset($this->writeStreams[$id])) {
            $this->writeStreams[$id] = $stream;
            $this->writeListeners[$id] = $listener;
        }

        return $this;
    }

    /**
     * @param $stream
     * @return $this
     */
    public function removeReadStream($stream)
    {
        $id = (int) $stream;

        unset($this->readStreams[$id]);
        unset($this->readListeners[$id]);

        return $this;
    }

    /**
     * @param $stream
     * @return $this
     */
    public function removeWriteStream($stream)
    {
        $id = (int) $stream;

        unset($this->writeStreams[$id]);
        unset($this->writeListeners[$id]);

        return $this;
    }

    /**
     * @param $stream
     * @return $this
     */
    public function removeStream($stream)
    {
        $this->removeReadStream($stream);
        $this->removeWriteStream($stream);

        return $this;
    }

    /**
     * @return int
     */
    protected function getNextEventMicroTime()
    {
        $nextEvent = $this->poller->getFirst();

        if (null === $nextEvent) {
            return self::QUANTUM_INTERVAL;
        }

        $currentTime = microtime(true);
        if ($nextEvent > $currentTime) {
            return ($nextEvent - $currentTime) * 1000000;
        }

        return 0;
    }
}
