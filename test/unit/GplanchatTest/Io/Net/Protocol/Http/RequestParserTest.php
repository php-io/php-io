<?php


namespace GplanchatTest\Io\Net\Protocol\Http;

use Gplanchat\Io\Net\Protocol\Http\RequestParser;
use GplanchatTest\Test\Synchronous\TestCase;

class RequestParserTest
    extends TestCase
{
    public function testSimpleAndValidRequestParsing()
    {
        $parser = new RequestParser();

        $request = "GET /anywhere/in/the/path.html HTTP/1.1\r\n"
            . "Host: localhost\r\n"
            . "Content-Type: text/plain\r\n"
            . "Accept: text/plain\r\n"
            . "\r\n";

        $stub = $this->getMock('GplanchatTest\\Test\\MockedCallback', ['__invoke']);

        $stub->expects($this->once())
            ->method('__invoke')
            ->with($this->isInstanceOf('Gplanchat\\EventManager\\Event'),
                $this->equalTo('GET'), $this->equalTo('/anywhere/in/the/path.html'), $this->equalTo('HTTP/1.1'))
        ;

        $parser->on(['state'], $stub);

        $stub = $this->getMock('stdClass', ['__invoke']);

        $stub->expects($this->at(0))
            ->method('__invoke')
            ->with($this->isInstanceOf('Gplanchat\\EventManager\\Event'), $this->equalTo('Host'), $this->equalTo('localhost'))
        ;

        $stub->expects($this->at(1))
            ->method('__invoke')
            ->with($this->isInstanceOf('Gplanchat\\EventManager\\Event'), $this->equalTo('Content-Type'), $this->equalTo('text/plain'))
        ;

        $stub->expects($this->at(2))
            ->method('__invoke')
            ->with($this->isInstanceOf('Gplanchat\\EventManager\\Event'), $this->equalTo('Accept'), $this->equalTo('text/plain'))
        ;

        $parser->on(['header'], $stub);

        $parser->parse($request);
    }

    public function testSimpleAndInvalidNewLineRequestParsing()
    {
        $parser = new RequestParser();

        $request = "GET /anywhere/in/the/path.html HTTP/1.1\n"
            . "Host: localhost\n"
            . "Content-Type: text/plain\n"
            . "Accept: text/plain\n"
            . "\n";

        $stub = $this->getMock('GplanchatTest\\Test\\MockedCallback', ['__invoke']);

        $stub->expects($this->once())
            ->method('__invoke')
            ->with($this->isInstanceOf('Gplanchat\\EventManager\\Event'),
                $this->equalTo('GET'), $this->equalTo('/anywhere/in/the/path.html'), $this->equalTo('HTTP/1.1'))
        ;

        $parser->on(['state'], $stub);

        $stub = $this->getMock('stdClass', ['__invoke']);

        $stub->expects($this->at(0))
            ->method('__invoke')
            ->with($this->isInstanceOf('Gplanchat\\EventManager\\Event'), $this->equalTo('Host'), $this->equalTo('localhost'))
        ;

        $stub->expects($this->at(1))
            ->method('__invoke')
            ->with($this->isInstanceOf('Gplanchat\\EventManager\\Event'), $this->equalTo('Content-Type'), $this->equalTo('text/plain'))
        ;

        $stub->expects($this->at(2))
            ->method('__invoke')
            ->with($this->isInstanceOf('Gplanchat\\EventManager\\Event'), $this->equalTo('Accept'), $this->equalTo('text/plain'))
        ;

        $parser->on(['header'], $stub);

        $parser->parse($request);
    }
}
