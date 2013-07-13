<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

include __DIR__ . '/../vendor/autoload.php';

$htmlBody = <<<HTML_EOF
<head>
<script type="text/javascript">
//<![CDATA[
var client = null;
var url = "ws://localhost:8081";

if (window.WebSocket) {
    client = new window.WebSocket(url);
} else if (window.MozWebSocket) {
    client = new window.MozWebSocket(url);
} else {
    throw "Your browser does not support HTML5 Web Sockets.";
}

client.onmessage = function(e){
    var m = document.getElementById('messages');
    m.innerHTML = '<pre>' + e.data + '</pre>';
};
client.onopen = function(e){
    setInterval(function(){client.send(JSON.stringify(['Hello', {World: '!'}]));}, 1000);
};
//]]>
</script>
</head>
<body>
<h1>Hello admin</h1>
<div id="messages"></div>
</body>
</html>
HTML_EOF;

use Gplanchat\Io\Adapter\Libuv\DefaultServiceManager as LibuvServiceManager;
use Gplanchat\Io\Application\Application;
use Gplanchat\Io\Net\Protocol\Http;
use Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket;
use Gplanchat\EventManager\Event;
use Gplanchat\Io\Net\Tcp\ClientInterface;
use Gplanchat\Io\Net\Tcp\Plugin\Server as TcpServerPlugin;
use Gplanchat\Io\Net\Protocol\Http\Plugin\Server as HttpServerPlugin;
use Gplanchat\Io\Application\Plugin;

(new Application(new LibuvServiceManager()))
    ->registerPlugin(new TcpServerPlugin(), 'TcpServer', 10)
    //->registerPlugin(new HttpServerPlugin(), 'HttpServer', 10)
    //->registerPlugin(new Http\Plugin\WebSocket(), 'HttpServer.WebSocket', 10)
    ->init(function(Event $event, Application $application) use ($htmlBody) {
        $application->callPlugin('TcpServer', ['0.0.0.0', 8081]);

        echo 'Initiating HTTP functionality.' . PHP_EOL;
        /*
         * Initiating HTTP support
         */
        $httpServiceManager = new Http\ServerServiceManager();
        $application->getServiceManager()->registerPeeringServiceManager($httpServiceManager, 100);

        $httpServer = $httpServiceManager->getHttpServer($httpServiceManager, $application->getStorage('TcpServer'));

        $httpServer->listen(200, function(Event $event, ClientInterface $client, Http\Request $request, Http\Response $response) use ($htmlBody) {
            echo 'Recieving HTTP request.' . PHP_EOL;
            $response
                ->setHeader('Content-Type', 'text/html')
                ->setBody($htmlBody)
                ->setReturnCode(200, 'OK')
                ->emit(new Event('ready'))
            ;
        });

        /** @var Http\ServerConnectionHandler $connectionHandler */
//        $connectionHandler = $httpServiceManager->get('ServerConnectionHandler');
//        $connectionHandler->registerPlugin(new Plugin\Logger(), 'Logger', 10);

        $application->setStorage('Http.serviceManager', $httpServiceManager);
        $application->setStorage('Http.server', $httpServer);
    })
//    ->init(function(Event $event, Application $application) {
//        /*
//         * Adding WebSocket (RFC 6455) support
//         */
//        $webSocketServiceManager = new WebSocket\ServerServiceManager();
//        $application->getStorage('Http.serviceManager')->registerPeeringServiceManager($webSocketServiceManager, 200);
//
//        $plugin = new Http\Plugin\WebSocket($webSocketServiceManager, function(Event $event, ClientInterface $client, WebSocket\Request $request, WebSocket\Response $response) {
//            $response
//                ->addMessage(['Date' => date('c'), 'Hello' => 'World'])
//                ->emit(new Event('ready'))
//            ;
//        });
//
//        $application->getStorage('Http.server')
//            ->registerPlugin($plugin, 'WebSocket')
//            ->callPlugin('WebSocket');
//
//        $application->setStorage('WebSocket.serviceManager', $webSocketServiceManager);
//        $application->setStorage('WebSocket.plugin', $plugin);
//    })
    ->bootstrap()
    ->run()
;
