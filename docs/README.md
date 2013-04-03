Component Gplanchat/Io
==========



## Files

* Gplanchat/Io\Adapter\Libuv\DefaultServiceManager.php
* Gplanchat/Io\Adapter\Libuv\Filesystem\Filesystem.php
* Gplanchat/Io\Adapter\Libuv\Loop\Idle.php
* Gplanchat/Io\Adapter\Libuv\Loop\Loop.php
* Gplanchat/Io\Adapter\Libuv\Loop\Timer.php
* Gplanchat/Io\Adapter\Libuv\Net\AbstractIp4.php
* Gplanchat/Io\Adapter\Libuv\Net\AbstractIp6.php
* Gplanchat/Io\Adapter\Libuv\Net\SocketTrait.php
* Gplanchat/Io\Adapter\Libuv\Net\Tcp\Client.php
* Gplanchat/Io\Adapter\Libuv\Net\Tcp\Ip4.php
* Gplanchat/Io\Adapter\Libuv\Net\Tcp\Ip6.php
* Gplanchat/Io\Adapter\Libuv\Net\Tcp\Server.php
* Gplanchat/Io\Adapter\Polling\Loop\Idle.php
* Gplanchat/Io\Adapter\Polling\Loop\Loop.php
* Gplanchat/Io\Adapter\Polling\Loop\Timer.php
* Gplanchat/Io\Application\Application.php
* Gplanchat/Io\Application\DefaultServiceManager.php
* Gplanchat/Io\Buffer\BufferInterface.php
* Gplanchat/Io\Exception\InvalidDependecyException.php
* Gplanchat/Io\Exception\MissingDependecyException.php
* Gplanchat/Io\Exception\MissingExtensionException.php
* Gplanchat/Io\Exception.php
* Gplanchat/Io\Loop\IdleInterface.php
* Gplanchat/Io\Loop\LoopInterface.php
* Gplanchat/Io\Loop\TimerInterface.php
* Gplanchat/Io\Net\Protocol\ConnectionHandlerInterface.php
* Gplanchat/Io\Net\Protocol\Exception\Exception.php
* Gplanchat/Io\Net\Protocol\Http\Client.php
* Gplanchat/Io\Net\Protocol\Http\ClientServiceManager.php
* Gplanchat/Io\Net\Protocol\Http\DefaultRequestHandler.php
* Gplanchat/Io\Net\Protocol\Http\Exception\BadRequestException.php
* Gplanchat/Io\Net\Protocol\Http\Exception\Exception.php
* Gplanchat/Io\Net\Protocol\Http\Exception\RuntimeException.php
* Gplanchat/Io\Net\Protocol\Http\Exception\UnexpectedValueException.php
* Gplanchat/Io\Net\Protocol\Http\Exception\UnsupportedUpgradeException.php
* Gplanchat/Io\Net\Protocol\Http\Plugin\ServerPluginInterface.php
* Gplanchat/Io\Net\Protocol\Http\Plugin\ServerPluginTrait.php
* Gplanchat/Io\Net\Protocol\Http\Plugin\WebSocket.php
* Gplanchat/Io\Net\Protocol\Http\ProtocolUpgrader.php
* Gplanchat/Io\Net\Protocol\Http\ProtocolUpgraderFactory.php
* Gplanchat/Io\Net\Protocol\Http\ProtocolUpgraderInterface.php
* Gplanchat/Io\Net\Protocol\Http\Request.php
* Gplanchat/Io\Net\Protocol\Http\RequestFactory.php
* Gplanchat/Io\Net\Protocol\Http\Response.php
* Gplanchat/Io\Net\Protocol\Http\ResponseFactory.php
* Gplanchat/Io\Net\Protocol\Http\Server.php
* Gplanchat/Io\Net\Protocol\Http\ServerConnectionHandler.php
* Gplanchat/Io\Net\Protocol\Http\ServerServiceManager.php
* Gplanchat/Io\Net\Protocol\Http\Upgrade\ProtocolUpgradeAwareInterface.php
* Gplanchat/Io\Net\Protocol\Http\Upgrade\WebSocket\Request.php
* Gplanchat/Io\Net\Protocol\Http\Upgrade\WebSocket\RequestFactory.php
* Gplanchat/Io\Net\Protocol\Http\Upgrade\WebSocket\RequestHandler.php
* Gplanchat/Io\Net\Protocol\Http\Upgrade\WebSocket\RequestHandlerFactory.php
* Gplanchat/Io\Net\Protocol\Http\Upgrade\WebSocket\Response.php
* Gplanchat/Io\Net\Protocol\Http\Upgrade\WebSocket\ResponseFactory.php
* Gplanchat/Io\Net\Protocol\Http\Upgrade\WebSocket\ServerServiceManager.php
* Gplanchat/Io\Net\Protocol\RequestHandlerInterface.php
* Gplanchat/Io\Net\SocketInterface.php
* Gplanchat/Io\Net\Tcp\ClientDecoratorInterface.php
* Gplanchat/Io\Net\Tcp\ClientDecoratorTrait.php
* Gplanchat/Io\Net\Tcp\ClientInterface.php
* Gplanchat/Io\Net\Tcp\ServerDecoratorInterface.php
* Gplanchat/Io\Net\Tcp\ServerDecoratorTrait.php
* Gplanchat/Io\Net\Tcp\ServerInterface.php


## Documentation

Namespace `Gplanchat\Io\Adapter\Libuv`



#### Classes

##### Class `DefaultServiceManager`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv`_ [Read the docs](Gplanchat-Io-Adapter-Libuv.md#class-defaultservicemanager)

Basic loop class. A loop is designed to run event-driven code, the loop runsuntil there are registered I/O loops.



Namespace `Gplanchat\Io\Adapter\Libuv\Filesystem`



#### Classes

##### Class `Filesystem`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Filesystem`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Filesystem.md#class-filesystem)





Namespace `Gplanchat\Io\Adapter\Libuv\Loop`



#### Classes

##### Class `Idle`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#class-idle)



##### Class `Loop`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#class-loop)

Basic loop class. A loop is designed to run event-driven code, the loop runsuntil there are registered I/O loops.

##### Class `Timer`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#class-timer)



##### Class `Idle`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#class-idle)



##### Class `Timer`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#class-timer)





Namespace `Gplanchat\Io\Adapter\Libuv\Net`



#### Classes

##### Class `AbstractIp4`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Net.md#class-abstractip4)



##### Class `AbstractIp6`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Net.md#class-abstractip6)



##### Trait `SocketTrait`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Net.md#trait-sockettrait)

Class SocketTrait



Namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`



#### Classes

##### Class `Client`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-client)



##### Class `Ip4`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-ip4)



##### Class `Ip6`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-ip6)



##### Class `Server`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-server)





Namespace `Gplanchat\Io\Adapter\Polling\Loop`



#### Classes

##### Class `Loop`

_Declared in namespace `Gplanchat\Io\Adapter\Polling\Loop`_ [Read the docs](Gplanchat-Io-Adapter-Polling-Loop.md#class-loop)

Basic loop class. A loop is designed to run event-driven code, the loop runsuntil there are registered I/O loops.



Namespace `Gplanchat\Io\Application`



#### Classes

##### Class `Application`

_Declared in namespace `Gplanchat\Io\Application`_ [Read the docs](Gplanchat-Io-Application.md#class-application)

Class ApplicationLoop

##### Class `DefaultServiceManager`

_Declared in namespace `Gplanchat\Io\Application`_ [Read the docs](Gplanchat-Io-Application.md#class-defaultservicemanager)

Basic loop class. A loop is designed to run event-driven code, the loop runsuntil there are registered I/O loops.



Namespace `Gplanchat\Io\Buffer`



#### Classes

##### Interface `BufferInterface`

_Declared in namespace `Gplanchat\Io\Buffer`_ [Read the docs](Gplanchat-Io-Buffer.md#interface-bufferinterface)





Namespace `Gplanchat\Io\Exception`



#### Classes

##### Class `InvalidDependecyException`

_Declared in namespace `Gplanchat\Io\Exception`_ [Read the docs](Gplanchat-Io-Exception.md#class-invaliddependecyexception)



##### Class `MissingDependecyException`

_Declared in namespace `Gplanchat\Io\Exception`_ [Read the docs](Gplanchat-Io-Exception.md#class-missingdependecyexception)



##### Class `MissingExtensionException`

_Declared in namespace `Gplanchat\Io\Exception`_ [Read the docs](Gplanchat-Io-Exception.md#class-missingextensionexception)





Namespace `Gplanchat\Io`



#### Classes

##### Interface `Exception`

_Declared in namespace `Gplanchat\Io`_ [Read the docs](Gplanchat-Io.md#interface-exception)

Base Exception interface. Used as a catch-all for Gplanchat\Io package specific exceptions



Namespace `Gplanchat\Io\Loop`



#### Classes

##### Interface `IdleInterface`

_Declared in namespace `Gplanchat\Io\Loop`_ [Read the docs](Gplanchat-Io-Loop.md#interface-idleinterface)



##### Interface `LoopInterface`

_Declared in namespace `Gplanchat\Io\Loop`_ [Read the docs](Gplanchat-Io-Loop.md#interface-loopinterface)



##### Interface `TimerInterface`

_Declared in namespace `Gplanchat\Io\Loop`_ [Read the docs](Gplanchat-Io-Loop.md#interface-timerinterface)





Namespace `Gplanchat\Io\Net\Protocol`



#### Classes

##### Interface `ConnectionHandlerInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [Read the docs](Gplanchat-Io-Net-Protocol.md#interface-connectionhandlerinterface)



##### Interface `RequestHandlerInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [Read the docs](Gplanchat-Io-Net-Protocol.md#interface-requesthandlerinterface)





Namespace `Gplanchat\Io\Net\Protocol\Exception`



#### Classes

##### Interface `Exception`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Exception`_ [Read the docs](Gplanchat-Io-Net-Protocol-Exception.md#interface-exception)





Namespace `Gplanchat\Io\Net\Protocol\Http`



#### Classes

##### Class `Client`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-client)

Class Server

##### Class `ClientServiceManager`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-clientservicemanager)

Class ServerServiceManager

##### Class `DefaultRequestHandler`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-defaultrequesthandler)

Class DefaultRequestHandler

##### Class `ProtocolUpgrader`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-protocolupgrader)



##### Class `ProtocolUpgraderFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-protocolupgraderfactory)



##### Interface `ProtocolUpgraderInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#interface-protocolupgraderinterface)



##### Class `Request`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-request)



##### Class `RequestFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-requestfactory)



##### Class `Response`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-response)



##### Class `ResponseFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-responsefactory)



##### Class `Server`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-server)

Class Server

##### Class `ServerConnectionHandler`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-serverconnectionhandler)



##### Class `ServerServiceManager`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-serverservicemanager)

Class ServerServiceManager



Namespace `Gplanchat\Io\Net\Protocol\Http\Exception`



#### Classes

##### Class `BadRequestException`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Exception`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Exception.md#class-badrequestexception)



##### Interface `Exception`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Exception`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Exception.md#interface-exception)



##### Class `RuntimeException`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Exception`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Exception.md#class-runtimeexception)



##### Class `UnexpectedValueException`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Exception`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Exception.md#class-unexpectedvalueexception)



##### Class `UnsupportedUpgradeException`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Exception`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Exception.md#class-unsupportedupgradeexception)





Namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`



#### Classes

##### Interface `ServerPluginInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#interface-serverplugininterface)



##### Trait `ServerPluginTrait`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#trait-serverplugintrait)



##### Class `WebSocket`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#class-websocket)





Namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade`



#### Classes

##### Interface `ProtocolUpgradeAwareInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade.md#interface-protocolupgradeawareinterface)





Namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`



#### Classes

##### Class `Request`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-request)



##### Class `RequestFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-requestfactory)



##### Class `RequestHandler`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-requesthandler)



##### Class `RequestHandlerFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-requesthandlerfactory)



##### Class `Response`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-response)



##### Class `ResponseFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-responsefactory)



##### Class `ServerServiceManager`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-serverservicemanager)





Namespace `Gplanchat\Io\Net`



#### Classes

##### Interface `SocketInterface`

_Declared in namespace `Gplanchat\Io\Net`_ [Read the docs](Gplanchat-Io-Net.md#interface-socketinterface)





Namespace `Gplanchat\Io\Net\Tcp`



#### Classes

##### Interface `ClientDecoratorInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [Read the docs](Gplanchat-Io-Net-Tcp.md#interface-clientdecoratorinterface)



##### Trait `ClientDecoratorTrait`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [Read the docs](Gplanchat-Io-Net-Tcp.md#trait-clientdecoratortrait)



##### Interface `ClientInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [Read the docs](Gplanchat-Io-Net-Tcp.md#interface-clientinterface)



##### Interface `ServerDecoratorInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [Read the docs](Gplanchat-Io-Net-Tcp.md#interface-serverdecoratorinterface)



##### Trait `ServerDecoratorTrait`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [Read the docs](Gplanchat-Io-Net-Tcp.md#trait-serverdecoratortrait)



##### Interface `ServerInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [Read the docs](Gplanchat-Io-Net-Tcp.md#interface-serverinterface)







