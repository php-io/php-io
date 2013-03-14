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

namespace Gplanchat\Io\Net\Protocol\Http;

use ArrayObject;

class Request
{
    /**
     * @var string
     */
    private $method = null;

    /**
     * @var string
     */
    private $uri = null;

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

    public function __construct($method, $uri)
    {
        $this->method = $method;
        $this->uri = $uri;
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
     * @param ArrayObject $serverParams
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
    public function getQuery($key, $default = null)
    {
        if (!isset($this->queryParams[$key])) {
            return $default;
        }
        return $this->queryParams[$key];
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
}
