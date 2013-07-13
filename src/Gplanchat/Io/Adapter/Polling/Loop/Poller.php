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

use Gplanchat\Io\Adapter\Libuv\Loop\LoopAwareTrait;
use Gplanchat\Io\Loop\LoopAwareInterface;
use Gplanchat\Io\Loop\LoopInterface;
use InvalidArgumentException;
use SplObjectStorage;
use SplPriorityQueue;

class Poller
    extends Timers
    implements LoopAwareInterface
{
    use LoopAwareTrait;

    const PRECISION = 0.001;

    /**
     * @var float
     */
    private $precision = self::PRECISION;

    /**
     * @var float
     */
    private $time = null;

    /**
     * @var array
     */
    private $active = array();

    /**
     * @var SplObjectStorage
     */
    private $timers = null;

    /**
     * @var SplPriorityQueue
     */
    private $scheduler = null;

    /**
     * @param LoopInterface $loop
     * @param float $precision
     */
    public function __construct(LoopInterface $loop, $precision = self::PRECISION)
    {
        $this->setLoop($loop);

        $this->timers = new SplObjectStorage();
        $this->scheduler = new SplPriorityQueue();
        $this->precision = $precision;
    }

    /**
     * @param TimerInterface $timer
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function add(TimerInterface $timer)
    {
        $interval = $timer->getInterval();

        if ($interval < $this->getPrecision()) {
            throw new InvalidArgumentException('Timer events do not support sub-millisecond timeouts.');
        }

        $scheduledAt = $interval + $this->getTime();

        $this->timers->attach($timer, $scheduledAt);
        $this->scheduler->insert($timer, -$scheduledAt);

        return $this;
    }

    /**
     * @return float
     */
    public function updateTime()
    {
        return $this->time = microtime(true);
    }

    /**
     * @return float
     */
    public function getTime()
    {
        return $this->time ?: $this->updateTime();
    }

    /**
     * @param TimerInterface $timer
     * @return bool
     */
    public function contains(TimerInterface $timer)
    {
        return $this->timers->contains($timer);
    }

    /**
     * @param TimerInterface $timer
     * @return $this
     */
    public function cancel(TimerInterface $timer)
    {
        $this->timers->detach($timer);

        return $this;
    }

    /**
     * @return null
     */
    public function getFirst()
    {
        if ($this->scheduler->isEmpty()) {
            return null;
        }

        $scheduledAt = $this->timers[$this->scheduler->top()];

        return $scheduledAt;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return count($this->timers) === 0;
    }

    /**
     *
     */
    public function tick()
    {
        $time = $this->updateTime();
        $timers = $this->timers;
        $scheduler = $this->scheduler;

        while (!$scheduler->isEmpty()) {
            $timer = $scheduler->top();

            if (!isset($timers[$timer])) {
                $scheduler->extract();
                $timers->detach($timer);

                continue;
            }

            if ($timers[$timer] >= $time) {
                break;
            }

            $scheduler->extract();
            call_user_func($timer->getCallback(), $timer);

            if ($timer->isPeriodic() && isset($timers[$timer])) {
                $timers[$timer] = $scheduledAt = $timer->getInterval() + $time;
                $scheduler->insert($timer, -$scheduledAt);
            } else {
                $timers->detach($timer);
            }
        }
    }

    /**
     * @param float $precision
     * @return $this
     */
    public function setPrecision($precision)
    {
        $this->precision = $precision;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrecision()
    {
        return $this->precision;
    }
}
