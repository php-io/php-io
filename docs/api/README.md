Component Gplanchat\Io
==========



## Files

* Gplanchat/Io/Adapter/Libuv/DefaultServiceManager.php
* Gplanchat/Io/Adapter/Libuv/EventManager/CallbackHandler.php
* Gplanchat/Io/Adapter/Libuv/EventManager/EventEmitterTrait.php
* Gplanchat/Io/Adapter/Libuv/Filesystem/File.php
* Gplanchat/Io/Adapter/Libuv/Filesystem/Filesystem.php
* Gplanchat/Io/Adapter/Libuv/Loop/Idle.php
* Gplanchat/Io/Adapter/Libuv/Loop/Loop.php
* Gplanchat/Io/Adapter/Libuv/Loop/LoopInterface.php
* Gplanchat/Io/Adapter/Libuv/Loop/Timer.php
* Gplanchat/Io/Adapter/Libuv/Net/AbstractIp4.php
* Gplanchat/Io/Adapter/Libuv/Net/AbstractIp6.php
* Gplanchat/Io/Adapter/Libuv/Net/Exception/ConnectionError.php
* Gplanchat/Io/Adapter/Libuv/Net/Exception/Exception.php
* Gplanchat/Io/Adapter/Libuv/Net/Protocol/Http/RequestFactory/Standard.php
* Gplanchat/Io/Adapter/Libuv/Net/SocketTrait.php
* Gplanchat/Io/Adapter/Libuv/Net/Tcp/Client.php
* Gplanchat/Io/Adapter/Libuv/Net/Tcp/Ip4.php
* Gplanchat/Io/Adapter/Libuv/Net/Tcp/Ip6.php
* Gplanchat/Io/Adapter/Libuv/Net/Tcp/Server.php
* Gplanchat/Io/Adapter/Libuv/Net/Udp/Client.php
* Gplanchat/Io/Adapter/Libuv/Net/Udp/Ip4.php
* Gplanchat/Io/Adapter/Libuv/Net/Udp/Ip6.php
* Gplanchat/Io/Adapter/Libuv/Net/Udp/Server.php
* Gplanchat/Io/Adapter/Polling/DefaultServiceManager.php
* Gplanchat/Io/Adapter/Polling/Loop/Loop.php
* Gplanchat/Io/Adapter/Polling/Loop/LoopInterface.php
* Gplanchat/Io/Application/Application.php
* Gplanchat/Io/Application/Plugin/Logger.php
* Gplanchat/Io/Application/Plugin/PluginInterface.php
* Gplanchat/Io/Application/Plugin/PluginTrait.php
* Gplanchat/Io/Exception/InvalidDependencyException.php
* Gplanchat/Io/Exception/MissingDependecyException.php
* Gplanchat/Io/Exception/MissingExtensionException.php
* Gplanchat/Io/Exception.php
* Gplanchat/Io/Filesystem/FileInterface.php
* Gplanchat/Io/Filesystem/FilesystemInterface.php
* Gplanchat/Io/Filesystem/FileTrait.php
* Gplanchat/Io/Loop/IdleInterface.php
* Gplanchat/Io/Loop/LoopAwareInterface.php
* Gplanchat/Io/Loop/LoopAwareTrait.php
* Gplanchat/Io/Loop/LoopInterface.php
* Gplanchat/Io/Loop/TimerInterface.php
* Gplanchat/Io/Net/Exception/ConnectionError.php
* Gplanchat/Io/Net/Exception/Exception.php
* Gplanchat/Io/Net/Protocol/ConnectionHandlerInterface.php
* Gplanchat/Io/Net/Protocol/Exception/Exception.php
* Gplanchat/Io/Net/Protocol/Http/Client.php
* Gplanchat/Io/Net/Protocol/Http/ClientServiceManager.php
* Gplanchat/Io/Net/Protocol/Http/DefaultRequestHandler.php
* Gplanchat/Io/Net/Protocol/Http/Exception/BadRequestException.php
* Gplanchat/Io/Net/Protocol/Http/Exception/Exception.php
* Gplanchat/Io/Net/Protocol/Http/Exception/RuntimeException.php
* Gplanchat/Io/Net/Protocol/Http/Exception/UnexpectedValueException.php
* Gplanchat/Io/Net/Protocol/Http/Exception/UnsupportedUpgradeException.php
* Gplanchat/Io/Net/Protocol/Http/Plugin/Server.php
* Gplanchat/Io/Net/Protocol/Http/Plugin/ServerPluginInterface.php
* Gplanchat/Io/Net/Protocol/Http/Plugin/ServerPluginTrait.php
* Gplanchat/Io/Net/Protocol/Http/Plugin/WebSocket.php
* Gplanchat/Io/Net/Protocol/Http/ProtocolUpgrader.php
* Gplanchat/Io/Net/Protocol/Http/ProtocolUpgraderFactory.php
* Gplanchat/Io/Net/Protocol/Http/ProtocolUpgraderInterface.php
* Gplanchat/Io/Net/Protocol/Http/Request.php
* Gplanchat/Io/Net/Protocol/Http/RequestFactory/Standard.php
* Gplanchat/Io/Net/Protocol/Http/RequestFactory/Symfony.php
* Gplanchat/Io/Net/Protocol/Http/RequestParser.php
* Gplanchat/Io/Net/Protocol/Http/Response.php
* Gplanchat/Io/Net/Protocol/Http/ResponseFactory/Standard.php
* Gplanchat/Io/Net/Protocol/Http/ResponseFactory/Symfony.php
* Gplanchat/Io/Net/Protocol/Http/Server.php
* Gplanchat/Io/Net/Protocol/Http/ServerConnectionHandler.php
* Gplanchat/Io/Net/Protocol/Http/ServerServiceManager.php
* Gplanchat/Io/Net/Protocol/Http/Upgrade/ProtocolUpgradeAwareInterface.php
* Gplanchat/Io/Net/Protocol/Http/Upgrade/WebSocket/Request.php
* Gplanchat/Io/Net/Protocol/Http/Upgrade/WebSocket/RequestFactory.php
* Gplanchat/Io/Net/Protocol/Http/Upgrade/WebSocket/RequestHandler.php
* Gplanchat/Io/Net/Protocol/Http/Upgrade/WebSocket/RequestHandlerFactory.php
* Gplanchat/Io/Net/Protocol/Http/Upgrade/WebSocket/Response.php
* Gplanchat/Io/Net/Protocol/Http/Upgrade/WebSocket/ResponseFactory.php
* Gplanchat/Io/Net/Protocol/Http/Upgrade/WebSocket/ServerServiceManager.php
* Gplanchat/Io/Net/Protocol/RequestHandlerInterface.php
* Gplanchat/Io/Net/Protocol/RequestInterface.php
* Gplanchat/Io/Net/Protocol/ResponseInterface.php
* Gplanchat/Io/Net/SocketInterface.php
* Gplanchat/Io/Net/Tcp/ClientDecoratorInterface.php
* Gplanchat/Io/Net/Tcp/ClientDecoratorTrait.php
* Gplanchat/Io/Net/Tcp/ClientInterface.php
* Gplanchat/Io/Net/Tcp/Plugin/Server.php
* Gplanchat/Io/Net/Tcp/ServerDecoratorInterface.php
* Gplanchat/Io/Net/Tcp/ServerDecoratorTrait.php
* Gplanchat/Io/Net/Tcp/ServerInterface.php
* Gplanchat/Io/Net/Tcp/SocketFactory.php
* Gplanchat/Io/Net/Tcp/SocketInterface.php
* Gplanchat/Io/Net/Udp/ClientDecoratorInterface.php
* Gplanchat/Io/Net/Udp/ClientDecoratorTrait.php
* Gplanchat/Io/Net/Udp/ClientInterface.php
* Gplanchat/Io/Net/Udp/ServerDecoratorInterface.php
* Gplanchat/Io/Net/Udp/ServerDecoratorTrait.php
* Gplanchat/Io/Net/Udp/ServerInterface.php
* Gplanchat/Io/Net/Udp/SocketFactory.php
* Gplanchat/Io/Net/Udp/SocketInterface.php


## Documentation

### Namespace `Gplanchat\Io\Adapter\Libuv`



#### Classes

##### Class `DefaultServiceManager`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv.md#class-defaultservicemanager)

Basic loop class. A loop is designed to run event-driven code, the loop runs until there are registered I/O loops.

### Namespace `Gplanchat\Io\Adapter\Libuv\EventManager`



#### Classes

##### Class `CallbackHandler`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\EventManager`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-EventManager.md#class-callbackhandler)



##### Trait `EventEmitterTrait`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\EventManager`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-EventManager.md#trait-eventemittertrait)



### Namespace `Gplanchat\Io\Adapter\Libuv\Filesystem`



#### Classes

##### Class `File`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Filesystem`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Filesystem.md#class-file)

Class File

##### Class `Filesystem`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Filesystem`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Filesystem.md#class-filesystem)



### Namespace `Gplanchat\Io\Adapter\Libuv\Loop`



#### Classes

##### Class `Idle`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#class-idle)



##### Class `Loop`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#class-loop)

Basic loop class. A loop is designed to run event-driven code, the loop runs until there are registered I/O loops.

##### Interface `LoopInterface`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#interface-loopinterface)



##### Class `Timer`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#class-timer)



### Namespace `Gplanchat\Io\Adapter\Libuv\Net`



#### Classes

##### Class `AbstractIp4`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net.md#class-abstractip4)



##### Class `AbstractIp6`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net.md#class-abstractip6)



##### Trait `SocketTrait`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net.md#trait-sockettrait)

Class SocketTrait

### Namespace `Gplanchat\Io\Adapter\Libuv\Net\Exception`



#### Classes

##### Class `ConnectionError`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Exception`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Exception.md#class-connectionerror)



##### Interface `Exception`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Exception`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Exception.md#interface-exception)



### Namespace `Gplanchat\Io\Adapter\Libuv\Net\Protocol\Http\RequestFactory`



#### Classes

##### Class `Standard`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Protocol\Http\RequestFactory`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Protocol-Http-RequestFactory.md#class-standard)



### Namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`



#### Classes

##### Class `Client`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-client)



##### Class `Ip4`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-ip4)



##### Class `Ip6`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-ip6)



##### Class `Server`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-server)



### Namespace `Gplanchat\Io\Adapter\Libuv\Net\Udp`



#### Classes

##### Class `Client`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Udp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Udp.md#class-client)



##### Class `Ip4`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Udp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Udp.md#class-ip4)



##### Class `Ip6`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Udp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Udp.md#class-ip6)



##### Class `Server`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Udp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Udp.md#class-server)



### Namespace `Gplanchat\Io\Adapter\Polling`



#### Classes

##### Class `DefaultServiceManager`

_Declared in namespace `Gplanchat\Io\Adapter\Polling`_ [» Read the docs](Gplanchat-Io-Adapter-Polling.md#class-defaultservicemanager)

Basic loop class. A loop is designed to run event-driven code, the loop runs until there are registered I/O loops.

### Namespace `Gplanchat\Io\Adapter\Polling\Loop`



#### Classes

##### Class `Loop`

_Declared in namespace `Gplanchat\Io\Adapter\Polling\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Polling-Loop.md#class-loop)

Basic loop class. A loop is designed to run event-driven code, the loop runs until there are registered I/O loops.

##### Interface `LoopInterface`

_Declared in namespace `Gplanchat\Io\Adapter\Polling\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Polling-Loop.md#interface-loopinterface)



### Namespace `Gplanchat\Io\Application`



#### Classes

##### Class `Application`

_Declared in namespace `Gplanchat\Io\Application`_ [» Read the docs](Gplanchat-Io-Application.md#class-application)

Class ApplicationLoop

### Namespace `Gplanchat\Io\Application\Plugin`



#### Classes

##### Class `Logger`

_Declared in namespace `Gplanchat\Io\Application\Plugin`_ [» Read the docs](Gplanchat-Io-Application-Plugin.md#class-logger)



##### Interface `PluginInterface`

_Declared in namespace `Gplanchat\Io\Application\Plugin`_ [» Read the docs](Gplanchat-Io-Application-Plugin.md#interface-plugininterface)



##### Trait `PluginTrait`

_Declared in namespace `Gplanchat\Io\Application\Plugin`_ [» Read the docs](Gplanchat-Io-Application-Plugin.md#trait-plugintrait)



### Namespace `Gplanchat\Io\Exception`



#### Classes

##### Class `InvalidDependencyException`

_Declared in namespace `Gplanchat\Io\Exception`_ [» Read the docs](Gplanchat-Io-Exception.md#class-invaliddependencyexception)



##### Class `MissingDependecyException`

_Declared in namespace `Gplanchat\Io\Exception`_ [» Read the docs](Gplanchat-Io-Exception.md#class-missingdependecyexception)



##### Class `MissingExtensionException`

_Declared in namespace `Gplanchat\Io\Exception`_ [» Read the docs](Gplanchat-Io-Exception.md#class-missingextensionexception)



### Namespace `Gplanchat\Io`



#### Classes

##### Interface `Exception`

_Declared in namespace `Gplanchat\Io`_ [» Read the docs](Gplanchat-Io.md#interface-exception)

Base Exception interface. Used as a catch-all for Gplanchat\Io package specific exceptions

### Namespace `Gplanchat\Io\Filesystem`



#### Classes

##### Interface `FileInterface`

_Declared in namespace `Gplanchat\Io\Filesystem`_ [» Read the docs](Gplanchat-Io-Filesystem.md#interface-fileinterface)

Interface FileInterface

##### Interface `FilesystemInterface`

_Declared in namespace `Gplanchat\Io\Filesystem`_ [» Read the docs](Gplanchat-Io-Filesystem.md#interface-filesysteminterface)



##### Trait `FileTrait`

_Declared in namespace `Gplanchat\Io\Filesystem`_ [» Read the docs](Gplanchat-Io-Filesystem.md#trait-filetrait)

Class File

### Namespace `Gplanchat\Io\Loop`



#### Classes

##### Interface `IdleInterface`

_Declared in namespace `Gplanchat\Io\Loop`_ [» Read the docs](Gplanchat-Io-Loop.md#interface-idleinterface)



##### Interface `LoopAwareInterface`

_Declared in namespace `Gplanchat\Io\Loop`_ [» Read the docs](Gplanchat-Io-Loop.md#interface-loopawareinterface)



##### Trait `LoopAwareTrait`

_Declared in namespace `Gplanchat\Io\Loop`_ [» Read the docs](Gplanchat-Io-Loop.md#trait-loopawaretrait)



##### Interface `LoopInterface`

_Declared in namespace `Gplanchat\Io\Loop`_ [» Read the docs](Gplanchat-Io-Loop.md#interface-loopinterface)



##### Interface `TimerInterface`

_Declared in namespace `Gplanchat\Io\Loop`_ [» Read the docs](Gplanchat-Io-Loop.md#interface-timerinterface)



### Namespace `Gplanchat\Io\Net\Exception`



#### Classes

##### Class `ConnectionError`

_Declared in namespace `Gplanchat\Io\Net\Exception`_ [» Read the docs](Gplanchat-Io-Net-Exception.md#class-connectionerror)



##### Interface `Exception`

_Declared in namespace `Gplanchat\Io\Net\Exception`_ [» Read the docs](Gplanchat-Io-Net-Exception.md#interface-exception)



### Namespace `Gplanchat\Io\Net\Protocol`



#### Classes

##### Interface `ConnectionHandlerInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-connectionhandlerinterface)



##### Interface `RequestHandlerInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-requesthandlerinterface)



##### Interface `RequestInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-requestinterface)



##### Interface `ResponseInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-responseinterface)



### Namespace `Gplanchat\Io\Net\Protocol\Exception`



#### Classes

##### Interface `Exception`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Exception`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Exception.md#interface-exception)



### Namespace `Gplanchat\Io\Net\Protocol\Http`



#### Classes

##### Class `Client`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-client)

Class Server

##### Class `ClientServiceManager`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-clientservicemanager)

Class ServerServiceManager

##### Class `DefaultRequestHandler`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-defaultrequesthandler)

Class DefaultRequestHandler

##### Class `ProtocolUpgrader`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-protocolupgrader)



##### Class `ProtocolUpgraderFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-protocolupgraderfactory)



##### Interface `ProtocolUpgraderInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#interface-protocolupgraderinterface)



##### Class `Request`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-request)



##### Class `RequestParser`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-requestparser)



##### Class `Response`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-response)



##### Class `Server`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-server)

Class Server

##### Class `ServerConnectionHandler`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-serverconnectionhandler)



##### Class `ServerServiceManager`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-serverservicemanager)

Class ServerServiceManager

### Namespace `Gplanchat\Io\Net\Protocol\Http\Exception`



#### Classes

##### Class `BadRequestException`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Exception`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Exception.md#class-badrequestexception)



##### Interface `Exception`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Exception`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Exception.md#interface-exception)



##### Class `RuntimeException`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Exception`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Exception.md#class-runtimeexception)



##### Class `UnexpectedValueException`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Exception`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Exception.md#class-unexpectedvalueexception)



##### Class `UnsupportedUpgradeException`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Exception`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Exception.md#class-unsupportedupgradeexception)



### Namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`



#### Classes

##### Class `Server`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#class-server)



##### Interface `ServerPluginInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#interface-serverplugininterface)



##### Trait `ServerPluginTrait`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#trait-serverplugintrait)



##### Class `WebSocket`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#class-websocket)



### Namespace `Gplanchat\Io\Net\Protocol\Http\RequestFactory`



#### Classes

##### Class `Standard`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\RequestFactory`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-RequestFactory.md#class-standard)



##### Class `Symfony`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\RequestFactory`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-RequestFactory.md#class-symfony)



### Namespace `Gplanchat\Io\Net\Protocol\Http\ResponseFactory`



#### Classes

##### Class `Standard`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\ResponseFactory`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-ResponseFactory.md#class-standard)



##### Class `Symfony`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\ResponseFactory`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-ResponseFactory.md#class-symfony)



### Namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade`



#### Classes

##### Interface `ProtocolUpgradeAwareInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade.md#interface-protocolupgradeawareinterface)



### Namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`



#### Classes

##### Class `Request`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-request)



##### Class `RequestFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-requestfactory)



##### Class `RequestHandler`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-requesthandler)



##### Class `RequestHandlerFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-requesthandlerfactory)



##### Class `Response`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-response)



##### Class `ResponseFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-responsefactory)



##### Class `ServerServiceManager`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-serverservicemanager)



### Namespace `Gplanchat\Io\Net`



#### Classes

##### Interface `SocketInterface`

_Declared in namespace `Gplanchat\Io\Net`_ [» Read the docs](Gplanchat-Io-Net.md#interface-socketinterface)



### Namespace `Gplanchat\Io\Net\Tcp`



#### Classes

##### Interface `ClientDecoratorInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#interface-clientdecoratorinterface)



##### Trait `ClientDecoratorTrait`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#trait-clientdecoratortrait)



##### Interface `ClientInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#interface-clientinterface)



##### Interface `ServerDecoratorInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#interface-serverdecoratorinterface)



##### Trait `ServerDecoratorTrait`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#trait-serverdecoratortrait)



##### Interface `ServerInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#interface-serverinterface)



##### Class `SocketFactory`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#class-socketfactory)



##### Interface `SocketInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#interface-socketinterface)



### Namespace `Gplanchat\Io\Net\Tcp\Plugin`



#### Classes

##### Class `Server`

_Declared in namespace `Gplanchat\Io\Net\Tcp\Plugin`_ [» Read the docs](Gplanchat-Io-Net-Tcp-Plugin.md#class-server)



### Namespace `Gplanchat\Io\Net\Udp`



#### Classes

##### Interface `ClientDecoratorInterface`

_Declared in namespace `Gplanchat\Io\Net\Udp`_ [» Read the docs](Gplanchat-Io-Net-Udp.md#interface-clientdecoratorinterface)



##### Trait `ClientDecoratorTrait`

_Declared in namespace `Gplanchat\Io\Net\Udp`_ [» Read the docs](Gplanchat-Io-Net-Udp.md#trait-clientdecoratortrait)



##### Interface `ClientInterface`

_Declared in namespace `Gplanchat\Io\Net\Udp`_ [» Read the docs](Gplanchat-Io-Net-Udp.md#interface-clientinterface)



##### Interface `ServerDecoratorInterface`

_Declared in namespace `Gplanchat\Io\Net\Udp`_ [» Read the docs](Gplanchat-Io-Net-Udp.md#interface-serverdecoratorinterface)



##### Trait `ServerDecoratorTrait`

_Declared in namespace `Gplanchat\Io\Net\Udp`_ [» Read the docs](Gplanchat-Io-Net-Udp.md#trait-serverdecoratortrait)



##### Interface `ServerInterface`

_Declared in namespace `Gplanchat\Io\Net\Udp`_ [» Read the docs](Gplanchat-Io-Net-Udp.md#interface-serverinterface)



##### Class `SocketFactory`

_Declared in namespace `Gplanchat\Io\Net\Udp`_ [» Read the docs](Gplanchat-Io-Net-Udp.md#class-socketfactory)



##### Interface `SocketInterface`

_Declared in namespace `Gplanchat\Io\Net\Udp`_ [» Read the docs](Gplanchat-Io-Net-Udp.md#interface-socketinterface)







[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)