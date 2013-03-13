<?php

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\io\Net\ClientInterface;
use Gplanchat\EventManager\EventEmitterInterface;
use Gplanchat\EventManager\EventEmitterTrait;

class Response
    implements EventEmitterInterface
{
    use EventEmitterTrait;

    private $returnCode = 200;
    private $returnMessage = 'OK';
    private $body = null;

    private $headers = [
        'Connection' => 'close',
        'Server'     => 'Gplanchat/0.1'
    ];

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
