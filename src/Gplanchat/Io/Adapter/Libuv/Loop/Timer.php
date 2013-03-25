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

namespace Gplanchat\Io\Adapter\Libuv\Loop;

use Gplanchat\Io\Loop\LoopInterface;
use Gplanchat\Io\Loop\TimerInterface;

class Timer
    implements TimerInterface
{
    private $timer = null;

    /**
     * @param LoopInterface $loop
     */
    public function __construct(LoopInterface $loop)
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

