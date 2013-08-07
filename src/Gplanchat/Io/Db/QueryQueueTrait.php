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
namespace Gplanchat\Io\Db;

/**
 * Asynchronous SQL query queue trait
 *
 * @package    Gplanchat\Io
 * @subpackage Gplanchat\Io\Loop
 */
trait QueryQueueTrait
{
    /**
     * @var \SplPriorityQueue
     */
    private $priorityQueue = null;

    /**
     * @var null|callable
     */
    private $currentCallback = null;

    /**
     * @param \SplPriorityQueue $priorityQueue
     * @return $this
     */
    public function setPriorityQueue($priorityQueue)
    {
        $this->priorityQueue = $priorityQueue;

        return $this;
    }

    /**
     * @return \SplPriorityQueue
     */
    public function getPriorityQueue()
    {
        if ($this->priorityQueue === null) {
            $this->priorityQueue = new \SplPriorityQueue();
        }

        return $this->priorityQueue;
    }

    /**
     * @param callable $currentCallback
     * @return $this
     */
    protected function setCurrentCallback(callable $currentCallback)
    {
        $this->currentCallback = $currentCallback;

        return $this;
    }

    /**
     * @return callable|null
     */
    protected function getCurrentCallback()
    {
        return $this->currentCallback;
    }

    /**
     * @param string|object $query
     * @param callable $callback
     * @param int $priority
     * @return $this
     */
    public function enqueue($query, callable $callback, $priority = null)
    {
        $this->getPriorityQueue()->insert(array(
            QueryQueueInterface::DATA_QUERY => $query,
            QueryQueueInterface::DATA_CALLBACK => $callback,
        ), $priority);

        return $this;
    }

    /**
     * @return string|object
     */
    public function dequeue()
    {
        $node = $this->getPriorityQueue()->extract();

        $this->setCurrentCallback($node[QueryQueueInterface::DATA_CALLBACK]);

        return $node[QueryQueueInterface::DATA_QUERY];
    }

    /**
     * @param $result
     * @return $this
     */
    public function run($result)
    {
        if ($cb = $this->getCurrentCallback()) {
            $cb($result);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->getPriorityQueue()->count();
    }
}
