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
namespace Gplanchat\Io\Adapter\Libuv\Loop;

/**
 * Basic libuv loop class. A loop is designed to run event-driven code, the loop runs
 * until there are registered I/O handles.
 *
 * @package    Gplanchat\Io
 * @subpackage Libuv
 * @category   Loop
 * @author     Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence    GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */
class Loop
    implements LoopInterface
{
    /**
     * Instance of the singleton Loop running the default uv_loop resource
     *
     * @var Loop
     */
    private static $defaultInstance = null;

    /**
     * Contains the uv_loop resource
     *
     * @var resource
     */
    private $loop = null;

    /**
     * Returns the singleton instance, using the default uv_loop resource
     *
     * @return LoopInterface
     */
    public static function getDefaultInstance()
    {
        if (self::$defaultInstance === null) {
            self::$defaultInstance = new static();
            self::$defaultInstance->loop = \uv_default_loop();
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
     * @return LoopInterface
     */
    public function init()
    {
        $this->loop = \uv_loop_new();

        return $this;
    }

    /**
     * Cleans up the loop
     *
     * @return LoopInterface
     */
    public function cleanup()
    {
        \uv_loop_delete($this->loop);
        $this->loop = null;

        return $this;
    }

    /**
     * Runs the loop infinitely
     *
     * @return LoopInterface
     */
    public function run()
    {
        \uv_run($this->loop);

        return $this;
    }

    /**
     * Runs the loop only once
     *
     * @return LoopInterface
     */
    public function runOnce()
    {
        \uv_run_once($this->loop);

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
        if ($this->loop !== \uv_default_loop()) {
            \uv_loop_delete($this->loop);
        }

        return $this;
    }

    /**
     * Returns the uv_loop, for direct operations on the loop
     *
     * @return resource
     */
    public function getResource()
    {
        return $this->loop;
    }
}
