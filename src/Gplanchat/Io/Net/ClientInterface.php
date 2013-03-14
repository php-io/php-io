<?php
/**
 * This file is part of php-io.
 *
 * php-io is free software: you can redistribute it and/or modify it under the
 * terms of the GNU LEsser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * php-io is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with php-io.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Grégory PLANCHAT <g.planchat@gmail.com>
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @copyright Copyright (c) 2013 Grégory PLANCHAT (http://planchat.fr/)
 */
namespace Gplanchat\Io\Net;

use Gplanchat\Io\Loop\LoopInterface;
use Gplanchat\EventManager\EventEmitterInterface;

interface ClientInterface
    extends EventEmitterInterface
{
    /**
     * @param LoopInterface $loop
     * @param SocketInterface $socket
     * @param null $callback
     */
    public function __construct(LoopInterface $loop, SocketInterface $socket = null, callable $callback = null);

    /**
     * @param ServerInterface $server
     * @return ClientInterface
     */
    public function accept(ServerInterface $server);

    /**
     * @param SocketInterface $socket
     * @param callable $callback
     * @return ClientInterface
     */
    public function connect(SocketInterface $socket, callable $callback);

    /**
     * @param $buffer
     * @param callable|null $callback
     * @return mixed
     */
    public function write($buffer, callable $callback = null);

    /**
     * @param callable|null $callback
     * @return mixed
     */
    public function close(callable $callback = null);

    /**
     * @return resource
     */
    public function getResource();

    /***
     * @param LoopInterface $loop
     * @return ClientInterface
     */
    public function setLoop(LoopInterface $loop);

    /**
     * @return LoopInterface
     */
    public function getLoop();

    /**
     * @return ServerInterface|null
     */
    public function getServer();
}
