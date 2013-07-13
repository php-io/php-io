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

use ArrayObject;
use Gplanchat\Io\Net\Protocol\Http\Exception\BadRequestException;
use Gplanchat\Io\Net\Protocol\RequestInterface;

class Request
    implements RequestInterface
{
    /**
     * @var string
     */
    private $method = null;

    /**
     * @var string
     */
    private $path = null;

    /**
     * @var string
     */
    private $protocol = null;

    /**
     * @var string
     */
    private $cachedUri = null;

    /**
     * @var ArrayObject
     */
    private $headers = null;

    /**
     * @var ArrayObject
     */
    private $params = null;

    /**
     * @var ArrayObject
     */
    private $queryParams = null;

    /**
     * @var ArrayObject
     */
    private $postParams = null;

    /**
     * @var ArrayObject
     */
    private $serverParams = null;

    /**
     * @var ArrayObject
     */
    private $cookieParams = null;

    public function __construct($method, $uri, $protocol = null)
    {
        $this->method = strtoupper($method);
        $this->protocol = $protocol ?: 'HTTP/1.1';

        $explodedUrl = parse_url($uri);
        if (!isset($explodedUrl['path']) || empty($explodedUrl['path'])) {
            throw new BadRequestException('Invalid URI specified.');
        }
        $this->path = $explodedUrl['path'];

        $this->setHeaders(new \ArrayObject());
        $this->setParams(new \ArrayObject());
        $this->setPostParams(new \ArrayObject());
        $this->setServerParams(new \ArrayObject());
        $this->setCookieParams(new \ArrayObject());

        if (isset($explodedUrl['query'])) {
            parse_str($explodedUrl['query'], $queryParams);
            $this->setQueryParams(new \ArrayObject($queryParams));
        } else {
            $this->setQueryParams(new \ArrayObject());
        }
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param bool $useCached
     * @return string
     */
    public function getUri($useCached = true)
    {
        if (!$useCached || $this->cachedUri === null) {
            $this->cachedUri = $this->getPath();
            if ($this->getQueryParams()->count()) {
                $this->cachedUri .= '?' . \http_build_query($this->getQueryParams());
            }
        }

        return $this->cachedUri;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param ArrayObject $headers
     * @return Request
     */
    public function setHeaders(ArrayObject $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return ArrayObject
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param ArrayObject $postParams
     * @return Request
     */
    public function setPostParams(ArrayObject $postParams)
    {
        $this->postParams = $postParams;

        return $this;
    }

    /**
     * @return ArrayObject
     */
    public function getPostParams()
    {
        return $this->postParams;
    }

    /**
     * @param ArrayObject $queryParams
     * @return Request
     */
    public function setQueryParams(ArrayObject $queryParams)
    {
        $this->queryParams = $queryParams;

        return $this;
    }

    /**
     * @return ArrayObject
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * @param ArrayObject $cookieParams
     * @return Request
     */
    public function setCookieParams(ArrayObject $cookieParams)
    {
        $this->cookieParams = $cookieParams;

        return $this;
    }

    /**
     * @return ArrayObject
     */
    public function getCookieParams()
    {
        return $this->cookieParams;
    }

    /**
     * @param ArrayObject $serverParams
     * @return Request
     */
    public function setServerParams(ArrayObject $serverParams)
    {
        $this->serverParams = $serverParams;

        return $this;
    }

    /**
     * @return ArrayObject
     */
    public function getServerParams()
    {
        return $this->serverParams;
    }

    /**
     * @param ArrayObject $params
     * @return Request
     */
    public function setParams(ArrayObject $params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * @return ArrayObject
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return string
     */
    public function getHeader($key, $default = null)
    {
        if (!isset($this->headers[$key])) {
            return $default;
        }
        return $this->headers[$key];
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return string
     */
    public function setHeader($key, $value)
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return string
     */
    public function getQuery($key, $default = null)
    {
        if (!isset($this->queryParams[$key])) {
            return $default;
        }
        return $this->queryParams[$key];
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return string
     */
    public function setQuery($key, $value)
    {
        $this->queryParams[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return string
     */
    public function getPost($key, $default = null)
    {
        if (!isset($this->postParams[$key])) {
            return $default;
        }
        return $this->postParams[$key];
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return string
     */
    public function setPost($key, $value)
    {
        $this->postParams[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return string
     */
    public function getCookie($key, $default = null)
    {
        if (!isset($this->cookieParams[$key])) {
            return $default;
        }
        return $this->cookieParams[$key];
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return string
     */
    public function setCookie($key, $value)
    {
        $this->cookieParams[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return string
     */
    public function getServer($key, $default = null)
    {
        if (!isset($this->serverParams[$key])) {
            return $default;
        }
        return $this->serverParams[$key];
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return string
     */
    public function setServer($key, $value)
    {
        $this->serverParams[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return string
     */
    public function getParam($key, $default = null)
    {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }
        if (isset($this->postParams[$key])) {
            return $this->postParams[$key];
        }
        if (isset($this->queryParams[$key])) {
            return $this->queryParams[$key];
        }
        if (isset($this->cookieParams[$key])) {
            return $this->cookieParams[$key];
        }
        if (isset($this->serverParams[$key])) {
            return $this->serverParams[$key];
        }

        return $default;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return string
     */
    public function setParam($key, $value)
    {
        $this->params[$key] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    public function toString()
    {
        $buffer = sprintf('%s %s HTTP/1.1\r\n', $this->getMethod(), $this->getPath());

        foreach ($this->getHeaders() as $headerName => $headerValue) {
            $buffer .= sprintf("%s: %s\r\n", $headerName, $headerValue);
        }

        $buffer .= "\r\n";

        return $buffer;
    }
}
