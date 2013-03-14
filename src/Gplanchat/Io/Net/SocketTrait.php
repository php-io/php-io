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

use Gplanchat\Io\Net\SocketInterface;
use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;

trait SocketTrait
{
    private $socket = null;
    private $port = 0;
    private $transport = null;
    private $context = null;

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->socket;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s://%s:%d', $this->getTransport(), $this->getAddress(), $this->getPort());
    }

    /**
     * @return string
     */
    public function toStreamString()
    {
        return sprintf('%s://%s', $this->getTransport(), $this->getAddress());
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @return resource
     */
    public function getContext()
    {
        if ($this->context === null) {
            $this->context = \stream_context_create();
        }

        return $this->context;
    }

    /**
     * @param string $option
     * @param mixed $value
     * @param string|null $wrapper
     * @return SocketInterface
     */
    public function setContextOption($option, $value, $wrapper = null)
    {
        \stream_context_set_option($this->getContext(), $wrapper ?: $this->getTransport(), $option, $value);

        return $this;
    }

    /**
     * @param string $param
     * @param mixed $value
     * @return SocketInterface
     */
    public function setContextParam($param, $value)
    {
        \stream_context_set_params($this->getContext(), [$param => $value]);
    }
}
