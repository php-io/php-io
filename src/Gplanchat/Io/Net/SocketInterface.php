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

namespace Gplanchat\Io\Net;

use Gplanchat\Io\Net\Tcp\ClientInterface;
use Gplanchat\Io\Net\Tcp\ServerInterface;

interface SocketInterface
{
    const TRANSPORT_TCP = 'tcp';
    const TRANSPORT_UDP = 'udp';
    const TRANSPORT_TLS = 'tls';
    const TRANSPORT_SSl = 'ssl';

    /**
     * @return resource
     */
    public function getResource();

    /**
     * @return string
     */
    public function __toString();

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @return int
     */
    public function getPort();

    /**
     * @param ClientInterface $client
     * @param $callback
     * @return SocketInterface
     */
    public function connect(ClientInterface $client, callable $callback);

    /**
     * @param ServerInterface $server
     * @return SocketInterface
     */
    public function bind(ServerInterface $server);
}
