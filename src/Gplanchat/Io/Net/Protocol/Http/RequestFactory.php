<?php

namespace Gplanchat\Io\Net\Protocol\Http;

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

        if (isset($result['HEADERS']) && isset($result['HEADERS']['COOKIE'])) {
            $cookieData = [];
            parse_str($result['HEADERS']['COOKIE'], $cookieData);

            $request->setCookieParams(new ArrayObject($cookieData));
        }

        return $request;
    }
}
