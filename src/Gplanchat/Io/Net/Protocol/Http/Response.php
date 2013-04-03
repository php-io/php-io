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
namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\Io\Net\Protocol\ResponseInterface;
use Gplanchat\io\Net\Tcp\ClientInterface;
use Gplanchat\EventManager\EventEmitterTrait;

class Response
    implements ResponseInterface
{
    use EventEmitterTrait;

    private $returnCode = 200;
    private $returnMessage = 'OK';
    private $body = null;
    private $headers = [];

    public function send(ClientInterface $client)
    {
        $buffer = "HTTP/1.1 {$this->returnCode} {$this->returnMessage}\r\n";

        $this->headers['Content-Length'] = strlen($this->body);
        foreach ($this->headers as $headerName => $headerValue) {
            $buffer .= "{$headerName}: $headerValue\r\n";
        }

        $buffer .= "\r\n{$this->body}";

        $response = $this;
        $client->write($buffer, function(ClientInterface $client) use($response) {
            if ($response->getHeader('Connection') == 'close') {
                $client->close();
            }
        });

        return $this;
    }

    public function  setReturnCode($code, $message)
    {
        $this->returnCode = $code;
        $this->returnMessage = $message;

        return $this;
    }

    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function setHeader($headerName, $headerValue)
    {
        $this->headers[$headerName] = $headerValue;

        return $this;
    }

    public function hasHeader($headerName)
    {
        return isset($this->headers[$headerName]);
    }

    public function getHeader($headerName)
    {
        if (!$this->hasHeader($headerName)) {
            return null;
        }

        return $this->headers[$headerName];
    }
}
