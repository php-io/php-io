Asynchronous object-oriented I/O PHP library
=======================

`php-io` is an object oriented and event-driven Input-Output library, primarily designed to serve network traffic to PHP scripts. This library is based upon the `php-uv`'s `libuv` binding.

## The HTTP/WebSocket server example

A simple HTTP server could be implemented this way :

```php
<?php

use Gplanchat\Io\Application\Application;
use Gplanchat\Io\Net\Protocol\Http;
use Gplanchat\EventManager\Event;
use Gplanchat\Io\Net\Tcp\ClientInterface;


(new Application())
    ->init(function(Event $event, Application $application){
        $loop = $application->getLoop();
        $application->setCurrentLoop($loop);
        $loop->init();
    })
    ->init(function(Event $event, Application $application) {
        /*
         * Initiating the TCP/IP server, binding on port 8081
         */
        $socket = $application->getTcpIp4('0.0.0.0', 8081);
        $tcpServer = $application->getTcpServer($application->getServiceManager(), $application->getCurrentLoop(), $socket);

        /*
         * Initiationg HTTP support
         */
        $httpServiceManager = new Http\ServerServiceManager();
        $application->getServiceManager()->attachChild($httpServiceManager, 100);

        $httpServer = $httpServiceManager->getHttpServer($application->getServiceManager(), $tcpServer);

        $httpServer->listen(200, function(Event $event, ClientInterface $client, Http\Request $request, Http\Response $response) {
            $response
                ->setHeader('Content-Type', 'text/html')
                ->setBody('Hello World!')
                ->setReturnCode(200, 'OK')
                ->emit(new Event('ready'))
            ;
        });
    })
    ->bootstrap()
    ->run()
;
```

Adding WebSocket support can be made this way in an `init()` callback :

```php
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
```

## Documentation

### Interface `Gplanchat\Io\Loop\LoopInterface`

#### Method  `init`

Protoype : <code>LoopInterface public function init()</code>

Initializes the loop, no I/O operation can use the loop prior to the call to this method.

#### Method `cleanup`

Prototype : <code>LoopInterface public function cleanup()</code>

Cleans up the loop and frees every registered resource

#### Method `run`

Prototype : <code>LoopInterface public function run()</code>

Runs the loop

#### Method `runOnce`

Prototype : <code>LoopInterface public function runOnce()</code>

Runs the loop once

#### Method `stop`

Prototype : <code>LoopInterface public function stop()</code>

Stops the loop

#### Method `getResource`

Prototype : <code>resource public function getResource()</code>

Returns the internal `php-uv`'s `uv_loop` resource

### Class `Gplanchat\Io\Loop\Loop`

Implements : `Gplanchat\Io\Loop\LoopInterface`

#### Method  `getDefaultInstance`

Protoype : <code>Loop public static function getDefaultInstance()</code>

Returns the singleton loop instance, using the internal primary `uv_loop` resource.

### Class `Gplanchat\Io\Net\SocketInterface`

#### Method  `getResource`

Protoype : <code>resource public function getResource()</code>

Returns the internal `php-uv`'s `uv_sockaddr` resource

#### Method  `getResource`

Protoype : <code>string public function __toString()</code>

Returns the string representation of the socket

#### Method  `connect`

Protoype : <code>SocketInterface public function connect(ClientInterface $client, callable $callback)</code>

Connects a `ClientInterface` handle using the socket instance

#### Method  `bind`

Protoype : <code>SocketInterface public function bind(ServerInterface $server)</code>

Binds a `ServerInterface` handle to the socket


