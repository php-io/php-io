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

namespace Gplanchat\Io\Net\Tcp;

use Gplanchat\Io\Net\AbstractIp4;
use Gplanchat\Io\Net\SocketInterface;
use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;

class Ip4
    extends AbstractIp4
{
    /**
     * @param ClientInterface $client
     * @param callable $callback
     * @return SocketInterface
     */
    public function connect(ClientInterface $client, callable $callback)
    {
        $internalCallback = function($resource) use($callback, $client) {
            $client->on(['data'], $callback);
        };

        \uv_tcp_connect($client->getResource(), $internalCallback);

        return $this;
    }

    /**
     * @param ServerInterface $server
     * @return SocketInterface
     */
    public function bind(ServerInterface $server)
    {
        \uv_tcp_bind($server->getResource(), $this->getResource());

        return $this;
    }
}
