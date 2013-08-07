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
namespace Gplanchat\Io\Db\Mysql;

use Gplanchat\Io\Db\ConnectionInterface;
use Gplanchat\Io\Loop\TimerInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;

/**
 * MySQL asynchronous polling manager.
 *
 * @package    Gplanchat\Io
 * @subpackage Gplanchat\Io\Loop
 */
class Poller
    implements ServiceManagerAwareInterface
{
    use ServiceManagerAwareTrait;

    /**
     * @var \SplObjectStorage
     */
    private $connectionList = null;

    /**
     * @var int
     */
    private $timeout = 1;

    /**
     * @param ServiceManagerInterface $serviceManager
     */
    public function __construct(ServiceManagerInterface $serviceManager)
    {
        $this->setServiceManager($serviceManager);

        $this->connectionList = new \SplObjectStorage();
    }

    /**
     * @param ConnectionInterface $connection
     * @return $this
     */
    public function addConnection(ConnectionInterface $connection)
    {
        $this->connectionList->attach($connection->getResource(), $connection);

        return $this;
    }

    /**
     * @return \SplObjectStorage
     */
    public function getAllConnections()
    {
        return $this->connectionList;
    }

    /**
     * @param int $timeout
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param TimerInterface $timer
     * @param int $status
     * @return $this
     */
    public function __invoke(/*TimerInterface $timer, $status*/)
    {
        $links = $errors = $reject = [];
        foreach ($this->getAllConnections() as $connection) {
            /** @var ConnectionInterface $connection */
            if (($resource = $this->getAllConnections()[$connection]->poll()) === null) {
                continue;
            }

            $links[] = $errors[] = $reject[] = $resource;
        }

        if (!count($links)) {
            return $this;
        }

        if (\mysqli_poll($links, $errors, $reject, 0, $this->getTimeout())) {
            foreach ($links as $resource) {
                if (($result = $resource->reap_async_query()) === null) {
                    continue;
                }

                if (isset($this->connectionList[$resource])) {
                    $this->connectionList[$resource]->run($result);
                }

                if (!is_object($result)) {
                    mysqli_free_result($result);
                }
            }
        }

        return $this;
    }
}
