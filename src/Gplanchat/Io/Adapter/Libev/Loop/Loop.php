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

/**
 * @namespace
 */
namespace Gplanchat\Io\Adapter\Libev\Loop;

use EvLoop;

/**
 * Basic Libev loop class. A loop is designed to run event-driven code, the loop runs
 * until there are registered I/O handles.
 *
 * @package    Gplanchat\Io
 * @subpackage Libev
 * @category   Loop
 * @author     Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence    GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */
class Loop
    implements LoopInterface
{
    /**
     * Instance of the singleton Loop running the default EvLoop instance
     *
     * @var Loop
     */
    private static $defaultInstance = null;

    /**
     * Contains the EvLoop instance
     *
     * @var EvLoop
     */
    private $loop = null;

    /**
     * Returns the singleton instance, using the default EvLoop instance
     *
     * @return LoopInterface
     */
    public static function getDefaultInstance()
    {
        if (self::$defaultInstance === null) {
            self::$defaultInstance = new static();
            self::$defaultInstance->loop = EvLoop::defaultLoop();
        }

        return self::$defaultInstance;
    }

    public function __destruct()
    {
        $this->stop();
        $this->cleanup();
    }

    /**
     * Initialize the loop
     *
     * @return $this
     */
    public function init()
    {
        $this->loop = new EvLoop();

        return $this;
    }

    /**
     * Cleans up the loop
     *
     * @return $this
     */
    public function cleanup()
    {
        $this->loop->stop();
        $this->loop = null;

        return $this;
    }

    /**
     * Runs the loop infinitely
     *
     * @return $this
     */
    public function run()
    {
        $this->loop->run();

        return $this;
    }

    /**
     * Runs the loop only once
     *
     * @return $this
     * @throws \RuntimeException
     */
    public function runOnce()
    {
        $this->loop->run(\Ev::RUN_ONCE);
    }

    /**
     * Stops the loop (mainly in case the loop would have been run infinitely)
     *
     * @param int|null $signal
     * @return $this
     */
    public function stop($signal = null)
    {
        $this->loop->stop();

        return $this;
    }

    /**
     * Returns the EvLoop, for direct operations on the loop
     *
     * @return EvLoop
     */
    public function getBackend()
    {
        return $this->loop;
    }
}
