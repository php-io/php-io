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
    ->registerPlugin(new HttpServerPlugin($httpListener), 'HttpServer', 0)
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

        $webSocketListener = function(Event $event, ClientInterface $client, WebSocket\Request $request, WebSocket\Response $response) {
            $response
                ->addMessage(['Date' => date('c'), 'Hello' => 'World'])
                ->emit(new Event('ready'))
            ;
        };

        $httpServer = $application->getStorage('HttpServer');
        $httpServer->registerPlugin('WebSocket', new Http\Plugin\WebSocket($webSocketServiceManager, $webSocketListener));
    })
```

## Using a database connection

For now, only MySQL using mysqli and mysqlnd is supported as a basic feature.

This is how you can implement a MySQL connection handler :

```php
use Gplanchat\Io\Application\Application;
use Gplanchat\EventManager\Event;
use Gplanchat\Io\Adapter\Libuv\DefaultServiceManager as LibuvServiceManager;
use Gplanchat\Io\Db\Mysql\DefaultServiceManager as MysqlServiceManager;

(new Application(new LibuvServiceManager()))
    ->init(function(Event $event, Application $application) {
        // Initiating the poller and assigning it to the main loop through a timer
        /** @var \Gplanchat\Io\Loop\TimerInterface $timer */
        $timer = $application->getServiceManager()->get('Timer', [$application->getCurrentLoop()]);

        $serviceManager = new MysqlServiceManager();
        $poller = $serviceManager->get('Poller');

        $link = $serviceManager->get('Connection', ['localhost', 'root', '', 'foo_database']);
        $poller->addConnection($link);

        $timer->interval(1, $poller);
        $application->setStorage('Db', $link);
    })
    ->init(function(Event $event, Application $application) {
        // Sending requests to the RDBMS
        $worker = $application->getServiceManager()->get('Timer', [$application->getCurrentLoop()]);
        $worker->interval(20, function() use($application) {
            $link = $application->getStorage('Db');

            $link->query('SELECT * FROM foo_table ORDER BY RAND() LIMIT 1', function($result) {
                var_dump($result);
            });
        });
    })
    ->bootstrap()
    ->run()
;
```
## Documentation

The API documentation Was built using php-docgen. [» Read the docs](docs/api/README.md)

