Asynchronous object-oriented I/O PHP library
=======================

`php-io` is an object oriented and event-driven Input-Output library, primarily designed to serve network traffic to PHP scripts.

This library is partly based upon the `php-uv`'s `libuv` binding, but other adapters are planned (pollig, libev, libevent)

## The HTTP/WebSocket server example

A simple HTTP server could be implemented this way :

```php
<?php

use Gplanchat\Io\Adapter\Libuv\DefaultServiceManager as LibuvServiceManager;
use Gplanchat\Io\Application\Application;
use Gplanchat\Io\Net\Protocol\Http;
use Gplanchat\EventManager\Event;
use Gplanchat\Io\Net\Tcp\ClientInterface;
use Gplanchat\Io\Net\Tcp\Plugin\Server as TcpServerPlugin;
use Gplanchat\Io\Net\Protocol\Http\Plugin\Server as HttpServerPlugin;


$httpListener = function(Event $event, ClientInterface $client, Http\Request $request, Http\Response $response) {
    $htmlBody = <<<HTML_EOF
<html>
  <head>
    <title>Hello World</title>
  </head>
  <body>
    <h1>Hello world</h1>
  </body>
</html>
HTML_EOF;

    $response
        ->setHeader('Content-Type', 'text/html')
        ->setBody($htmlBody)
        ->setReturnCode(200, 'OK')
        ->emit(new Event('ready'))
    ;
};

(new Application(new LibuvServiceManager()))
    ->registerPlugin(new TcpServerPlugin(), 'TcpServer', 0)
    ->registerPlugin(new HttpServerPlugin(), 'HttpServer', 0)
    ->init(function(Event $event, Application $application) {
        $application->callPlugin('TcpServer', ['0.0.0.0', 8081]);
        $application->callPlugin('HttpServer', ['TcpServer', 200]);
    })
    ->bootstrap()
    ->run()
;
```

Adding WebSocket support can be made this way by calling the `init()` method :

```php
    ->init(function(Event $event, Application $application) {
        /*
         * Adding WebSocket (RFC 6455) support
         */
        $webSocketServiceManager = new WebSocket\ServerServiceManager();
        $httpServiceManager->attachChild($webSocketServiceManager, 100);

        $httpServer->registerPlugin('WebSocket', new Http\Plugin\WebSocket($webSocketServiceManager, function(Event $event, ClientInterface $client, WebSocket\Request $request, WebSocket\Response $response) {
            $response
                ->addMessage(['Date' => date('c'), 'Hello' => 'World'])
                ->emit(new Event('ready'))
            ;
        }));
    })
```

## Documentation

The API documentation Was built using php-docgen. [» Read the docs](docs/api/README.md)

