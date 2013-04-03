<?php


namespace GplanchatTest\Io\Net\Protocol\Http;

use Gplanchat\EventManager\Event;
use Gplanchat\Io\Net\Protocol\Http\Request;
use Gplanchat\Io\Net\Protocol\Http\RequestParser;

class RequestParserTest
    extends \PHPUnit_Framework_TestCase
{
    public function testParsing()
    {
        $parser = new RequestParser();

        $request = "GET / HTTP/1.1\r\nHost: localhost\r\nContent-Type: text/plain\r\nAccept: text/plain\r\n\r\n";
        $parser->on(['state'], function(Event $e, $method, $path, $version) {
        });
        $parser->on(['header'], function(Event $e, $headerName, $headerValue) {
        });

        $parser->parse($request);
    }
}
