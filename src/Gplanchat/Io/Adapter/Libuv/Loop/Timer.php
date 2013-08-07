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

use Gplanchat\Io\Loop\LoopAwareInterface;
use Gplanchat\Io\Loop\LoopAwareTrait;
use Gplanchat\Io\Loop\LoopInterface as BaseLoopInterface;
use Gplanchat\Io\Loop\TimerInterface;

/**
 * Timer class, used to run callbacks at a desired timeout or at desired
 * intervals. A timer is a tool to run callbacks at a desired time, the
 * callback will run *after* the timeout has expired.
 *
 * @package    Gplanchat\Io
 * @subpackage Libuv
 * @category   Loop
 * @author     Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence    GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */
class Timer
    implements TimerInterface, LoopAwareInterface
{
    use LoopAwareTrait;

    /**
     * The internal php-uv resource
     *
     * @var resource
     */
    private $timer = null;

    /**
     * Constructor. Accepts as an argument the loop on which the timer will run.
     *
     * @param BaseLoopInterface $loop
     */
    public function __construct(BaseLoopInterface $loop)
    {
        $this->setLoop($loop);
        $this->timer = \uv_timer_init($loop->getResource());
    }

    /**
     * Internal centralized method used to regitser timers.
     *
     * @param $startTimeout
     * @param $repeatTimeout
     * @param callable $callback
     */
    protected function _registerTimer($startTimeout, $repeatTimeout, callable $callback)
    {
        $self = $this;
        \uv_timer_start($this->timer, $startTimeout, $repeatTimeout, function($uv, $status) use($self, $callback) {
            $callback($self, $status);
        });
    }

    /**
     * Execute the callback at a specific timeout.
     *
     * @param int $timeout
     * @param callable $callback
     * @return Timer
     */
    public function timeout($timeout, callable $callback)
    {
        $this->_registerTimer($timeout, 0, $callback);

        return $this;
    }

    /**
     * Execute the callback at a specific interval.
     *
     * @param int $timeout
     * @param callable $callback
     * @return Timer
     */
    public function interval($timeout, callable $callback)
    {
        $this->_registerTimer($timeout, $timeout, $callback);

        return $this;
    }

    /**
     * Execute the callback at a specific interval after a specific timeout.
     *
     * @param int $startTimeout
     * @param int $repeatTimeout
     * @param callable $callback
     * @return Timer
     */
    public function repeater($startTimeout, $repeatTimeout, callable $callback)
    {
        $this->_registerTimer($startTimeout, $repeatTimeout, $callback);

        return $this;
    }

    /**
     * Restart the timer call if it was stopped.
     *
     * @return Timer
     */
    public function repeat()
    {
        \uv_timer_again($this->timer);

        return $this;
    }

    /**
     * Define a new repeating timeout.
     *
     * @param int $timeout
     * @return Timer
     */
    public function setRepeatTimeout($timeout)
    {
        \uv_timer_set_repeat($this->timer, $timeout);

        return $this;
    }

    /**
     * Stops the timer
     *
     * @return Timer
     */
    public function stop()
    {
        \uv_timer_stop($this->timer);

        return $this;
    }
}

