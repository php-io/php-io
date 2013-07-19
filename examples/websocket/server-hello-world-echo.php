<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

include __DIR__ . '/../../vendor/autoload.php';

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
    ->registerPlugin($tcpServerPlugin = new TcpServerPlugin(), 'TcpServer', 0)
    ->registerPlugin(new HttpServerPlugin(), 'HttpServer', 0)
    ->registerPlugin(new HttpServerPlugin(), 'HttpServer', 0)
    ->init(function(Event $event, Application $application) {
        $application->callPlugin('TcpServer', ['0.0.0.0', 8081]);
        $application->callPlugin('HttpServer', ['TcpServer', 200]);
        $application->callPlugin('HttpServer', ['HttpServer', 200]);
    })
    ->bootstrap()
    ->run()
;
