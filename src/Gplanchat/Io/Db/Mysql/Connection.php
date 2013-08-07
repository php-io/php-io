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
use Gplanchat\Io\Db\QueryQueue;

/**
 * Asynchronous MySQL connection adapter.
 *
 * @package    Gplanchat\Io
 * @subpackage Gplanchat\Io\Loop
 */
class Connection
    implements ConnectionInterface
{
    /**
     * @var \mysqli
     */
    private $resource = null;

    private $queryQueue = null;

    private $idle = true;

    public function __construct($hostname = null, $username = null, $password = null, $database = null, $port = null, $socket = null)
    {
        if ($hostname === null) {
            $this->resource = new \mysqli();
        } else if ($username === null) {
            $this->resource = new \mysqli($hostname);
        } else if ($password === null) {
            $this->resource = new \mysqli($hostname, $username);
        } else if ($database === null) {
            $this->resource = new \mysqli($hostname, $username, $password);
        } else if ($port === null) {
            $this->resource = new \mysqli($hostname, $username, $password, $database);
        } else if ($socket === null) {
            $this->resource = new \mysqli($hostname, $username, $password, $database, $port);
        } else {
            $this->resource = new \mysqli($hostname, $username, $password, $database, $port, $socket);
        }

        $this->queryQueue = new QueryQueue();
    }

    public function query($request, callable $callback, $prioity = null)
    {
        $this->queryQueue->enqueue($request, $callback, $prioity);

        $this->poll();

        return $this;
    }

    public function poll()
    {
        if ($this->idle === true) {
            if ($this->queryQueue->count() <= 0) {
                return null;
            }

            $this->getResource()
                ->query($this->queryQueue->dequeue(), MYSQLI_STORE_RESULT | MYSQLI_ASYNC);

            $this->idle = false;
        }

        return $this->getResource();
    }

    public function run($result)
    {
        $this->queryQueue->run($result);
        $this->idle = true;

        return $this;
    }

    /**
     * @return \mysqli
     */
    public function getResource()
    {
        return $this->resource;
    }
}
