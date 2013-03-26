<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

spl_autoload_register(function($className){
    $className = ltrim($className, '\\');
    $fileName  = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});

set_include_path(implode(PATH_SEPARATOR, [
    __DIR__,
    __DIR__ . '/../vendor/php-event-manager/src',
    __DIR__ . '/../vendor/php-service-manager/src',
    __DIR__ . '/../vendor/php-plugin-manager/src',
    __DIR__ . '/../vendor/php-log/src',
    __DIR__ . '/../vendor/psr-log',
    __DIR__ . '/../vendor/ZendFramework2/library',
]));

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

use Gplanchat\Io\Application\Application;
use Gplanchat\Io\Net\Protocol\Http;
use Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket;
use Gplanchat\EventManager\Event;
use Gplanchat\Io\Net\Tcp\ClientInterface;

(new Application())
    ->init(function(Event $event, Application $application){
        $loop = $application->getLoop();
        $application->setCurrentLoop($loop);
        $loop->init();
    })
    ->init(function(Event $event, Application $application) use ($htmlBody) {
        /*
         * Initiating the TCP/IP server, binding on port 8081
         */
        $socket = $application->getTcpIp4('0.0.0.0', 8081);
        $tcpServer = $application->getTcpServer($application->getServiceManager(), $application->getCurrentLoop(), $socket);

        $application->setStorage('TcpServer.default', $tcpServer);

        /*
         * Initiating HTTP support
         */
        $httpServiceManager = new Http\ServerServiceManager();
        $application->getServiceManager()->attachChild($httpServiceManager, 100);

        $httpServer = $httpServiceManager->getHttpServer($application->getServiceManager(), $tcpServer);

        $httpServer->listen(200, function(Event $event, ClientInterface $client, Http\Request $request, Http\Response $response) use ($htmlBody) {
            $response
                ->setHeader('Content-Type', 'text/html')
                ->setBody($htmlBody)
                ->setReturnCode(200, 'OK')
                ->emit(new Event('ready'))
            ;
        });

        $application->setStorage('Http.serviceManager', $httpServiceManager);
        $application->setStorage('Http.server', $httpServer);
    })
    ->init(function(Event $event, Application $application) {
        /*
         * Adding WebSocket (RFC 6455) support
         */
        $webSocketServiceManager = new WebSocket\ServerServiceManager();
        $application->getStorage('Http.serviceManager')->attachChild($webSocketServiceManager, 200);

        $plugin = new Http\Plugin\WebSocket($webSocketServiceManager, function(Event $event, ClientInterface $client, WebSocket\Request $request, WebSocket\Response $response) {
            $response
                ->addMessage(['Date' => date('c'), 'Hello' => 'World'])
                ->emit(new Event('ready'))
            ;
        });

        $application->getStorage('Http.server')->registerPlugin('WebSocket', $plugin);

        $application->setStorage('WebSocket.serviceManager', $webSocketServiceManager);
        $application->setStorage('WebSocket.plugin', $plugin);
    })
    ->bootstrap()
    ->run()
;
