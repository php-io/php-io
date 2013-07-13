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
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\Io\Net\Protocol\Http\Exception;
use ArrayObject;

class RequestFactory
{
    public function __invoke(ServiceManagerInterface $serviceManager, array $moreParams = [])
    {
        if (!isset($moreParams['buffer'])) {
            throw new Exception\UnexpectedValueException('Could not parse request.');
        }

        /** @var RequestParser $requestParser */
        $requestParser = $serviceManager->get('RequestParser');

        /** @var Request $request */
        $request = null;
        $requestParser->on(['state'], function(Event $event, $method, $path, $version) use (&$request) {
            $request = new Request($method, $path, $version);
        });

        $requestParser->on(['header'], function(Event $e, $headerName, $headerValue) use ($request) {
            /** @var Request $request */

            $name = \str_replace('-', '_', \strtoupper($headerName));
            if ($name === 'COOKIE') {
                $cookieData = [];
                parse_str($headerValue, $cookieData);

                $request->setCookieParams(new ArrayObject($cookieData));
            } else {
                $request->setHeader($name, $headerValue);
            }
        });

        $requestParser->on(['body'], function(Event $e, $body) use ($request) {
            /** @var Request $request */
            if (!in_array($request->getMethod(), ['GET', 'HEAD']) && !empty($body)) {
                $postData = [];
                parse_str($body, $postData);

                $request->setPostParams(new ArrayObject($postData));
            }
        });

        return $request;
    }
}
