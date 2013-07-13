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

use Gplanchat\EventManager\Event;
use Gplanchat\EventManager\EventEmitterInterface;
use Gplanchat\EventManager\EventEmitterTrait;
use Gplanchat\Io\Net\Protocol\Http\Exception;

class RequestParser
    implements EventEmitterInterface
{
    use EventEmitterTrait;

    /**
     * @param string $buffer
     * @param mixed $requestObject
     * @return int
     */
    public function parse($buffer, $requestObject = null)
    {
        $offset = $this->parseState($requestObject, $buffer);
        $offset = $this->parseHeaders($requestObject, $buffer, $offset);
        $offset = $this->parseBody($requestObject, $buffer, $offset);

        return $offset;
    }

    /**
     * @param mixed $requestObject
     * @param string $buffer
     * @return int
     * @throws Exception\BadRequestException
     */
    public function parseState($requestObject, $buffer)
    {
        if (($offset = strpos($buffer, "\n")) === false) {
            throw new Exception\BadRequestException('Invalid request format.');
        }
        $state = \trim(\substr($buffer, 0, $offset));

        if (($methodOffset = \strpos($state, ' ')) === false) {
            throw new Exception\BadRequestException('Invalid request format.');
        }

        if (($pathOffset = \strpos($state, ' ', $methodOffset + 1)) === false) {
            throw new Exception\BadRequestException('Invalid request format.');
        }

        $method = \trim(\substr($state, 0, $methodOffset));
        $path = \trim(\substr($state, $methodOffset + 1, $pathOffset - $methodOffset));
        $version = \trim(\substr($state, $pathOffset + 1, $offset - $pathOffset));

        $this->emit(new Event('state', ['requestObject' => $requestObject]), [$method, $path, $version]);

        return $offset;
    }

    /**
     * @param mixed $requestObject
     * @param string $buffer
     * @param int $offset
     * @return int
     * @throws Exception\BadRequestException
     */
    public function parseHeaders($requestObject, $buffer, $offset = 0)
    {
        for ($counter = 0; $counter < 50; $counter++) {
            if (($eol = strpos($buffer, "\n", $offset + 1)) === false) {
                throw new Exception\BadRequestException('Invalid request format.');
            }
            $line = \trim(\substr($buffer, $offset, $eol - $offset));

            if (empty($line)) {
                return $offset;
            }

            if (($columnPosition = strpos($line, ':')) === false) {
                throw new Exception\BadRequestException('Invalid request format.');
            }
            $headerName = \trim(\substr($line, 0, $columnPosition));
            $headerValue = \trim(\substr($line, $columnPosition + 1));

            $this->emit(new Event('header', ['requestObject' => $requestObject]), [$headerName, $headerValue]);

            $offset = $eol + 1;
        }

        return $offset;
    }

    /**
     * @param mixed $requestObject
     * @param $buffer
     * @param int $offset
     * @return int
     */
    public function parseBody($requestObject, $buffer, $offset = 0)
    {
        $body = \substr($buffer, $offset + 1);

        $this->emit(new Event('body', ['requestObject' => $requestObject]), [$body]);

        return strlen($buffer);
    }
}
