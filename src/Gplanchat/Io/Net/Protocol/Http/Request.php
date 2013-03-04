<?php

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
    private $envParams = null;

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
}
