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

namespace Gplanchat\Io\Adapter\Libuv\Net\Protocol\Http\RequestFactory;

use Gplanchat\Io\Net\Protocol\Http\Request;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\Io\Net\Protocol\Http\Exception;
use ArrayObject;

class Standard
{
    public function __invoke(ServiceManagerInterface $serviceManager, array $moreParams = [])
    {
        if (!isset($moreParams['buffer'])) {
            throw new Exception\UnexpectedValueException('Could not parse request.');
        }

        $result = [];
        if (!\uv_http_parser_execute(\uv_http_parser_init(\UV::HTTP_REQUEST), $moreParams['buffer'], $result)) {
            throw new Exception\UnexpectedValueException('Could not parse request.');
        }

        if (!isset($result['REQUEST_METHOD'])) {
            throw new Exception\BadRequestException('No request method found or this method is not supported.');
        }

        if (!isset($result['PATH'])) {
            throw new Exception\BadRequestException('Invalid request path specified.');
        }

        $request = new Request($result['REQUEST_METHOD'], $result['PATH']);

        $method = $result['REQUEST_METHOD'];
        if (!in_array($method, ['GET', 'HEAD']) && isset($result['HEADERS']) && isset($result['HEADERS']['BODY'])) {
            $postData = [];
            parse_str($result['HEADERS']['BODY'], $postData);

            $request->setPostParams(new ArrayObject($postData));
        }

        if (isset($result['QUERY'])) {
            $queryData = [];
            parse_str($result['QUERY'], $queryData);

            $request->setQueryParams(new ArrayObject($queryData));
        }

        if (isset($result['HEADERS'])) {
            $request->setHeaders(new ArrayObject($result['HEADERS']));

            if (isset($result['HEADERS']['COOKIE'])) {
                $cookieData = [];
                parse_str($result['HEADERS']['COOKIE'], $cookieData);

                $request->setCookieParams(new ArrayObject($cookieData));
            }
        }

        return $request;
    }
}
