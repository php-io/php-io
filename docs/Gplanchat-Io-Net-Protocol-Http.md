Namespace `Gplanchat\Io\Net\Protocol\Http`
==========



#### Classes

### Class `Client`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-client)

Class Server

#### Implemented Interfaces

* `Gplanchat\Io\Net\Tcp\ClientDecoratorInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\Io\Net\Tcp\ClientInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Gplanchat\PluginManager\PluginAwareInterface`


#### Used Traits

* `Gplanchat\Io\Net\Tcp\ClientDecoratorTrait`
* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\PluginManager\PluginAwareTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : No


Parameter `client`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : No




#### Method `accept`

Parameter `server`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : No




#### Method `connect`

Parameter `socket`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : No


Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `write`

Parameter `buffer`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes


Parameter `callback`



* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `close`

Parameter `callback`



* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `poll`

#### Method `getResource`

#### Method `setLoop`

Parameter `loop`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : No




#### Method `getLoop`

#### Method `getServer`

#### Method `sendRequest`

Parameter `request`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : No


Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `get`

Parameter `uri`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes


Parameter `params`



* *type* : array
* *is nullable* : No


Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `post`

Parameter `uri`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes


Parameter `queryParams`



* *type* : array
* *is nullable* : No


Parameter `postParams`



* *type* : array
* *is nullable* : No


Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `getDecoratedClient`

#### Method `setDecoratedClient`

Parameter `decorated`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : No




#### Method `on`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `once`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `removeListener`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes


Parameter `callback`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : No




#### Method `removeAllListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes




#### Method `getListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes




#### Method `emit`

Parameter `event`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : No


Parameter `params`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `getServiceManager`

#### Method `setServiceManager`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : No




#### Method `registerPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes


Parameter `plugin`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : No




#### Method `getPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes




#### Method `clearPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Net\Protocol\Http\Client
* *is nullable* : Yes




#### Method `getPlugins`

#### Method `getServiceManager`



### Class `ClientServiceManager`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-clientservicemanager)

Class ServerServiceManager

#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerInterface`


#### Method `__construct`

Parameter `config`



* *type* : array
* *is nullable* : Yes
* *default value* : `NULL`

Parameter `configurator`



* *type* : Gplanchat\Io\Net\Protocol\Http\ClientServiceManager
* *is nullable* : Yes
* *default value* : `NULL`

Parameter `logger`



* *type* : Gplanchat\Io\Net\Protocol\Http\ClientServiceManager
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `getHttpClient`

Parameter ``



* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


Parameter ``



* *type* :  \Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No






### Class `DefaultRequestHandler`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-defaultrequesthandler)

Class DefaultRequestHandler

#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Gplanchat\Io\Net\Protocol\RequestHandlerInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\Log\LoggerAwareInterface`
* `Psr\Log\LoggerAwareInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\EventManager\EventEmitterTrait`
* `Gplanchat\Log\LoggerAwareTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No




#### Method `setCallbackHandler`

Parameter `callbackHanlder`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No




#### Method `getCallbackHandler`

#### Method `__invoke`

Parameter `event`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No


Parameter `client`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No


Parameter `buffer`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes


Parameter `length`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes


Parameter `isError`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes




#### Method `initRequest`

Parameter `client`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No


Parameter `buffer`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes


Parameter `length`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes




#### Method `initResponse`

Parameter `client`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No




#### Method `setupUpgrades`

Parameter `client`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No


Parameter `request`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No


Parameter `response`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No




#### Method `getServiceManager`

#### Method `setServiceManager`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No




#### Method `on`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `once`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `removeListener`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes


Parameter `callbackHandler`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No




#### Method `removeAllListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes




#### Method `getListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes




#### Method `emit`

Parameter `event`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No


Parameter `params`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `getLogger`

#### Method `setLogger`

Parameter `logger`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : No




#### Method `_registerEvent`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes


Parameter `isCalledOnce`



* *type* : Gplanchat\Io\Net\Protocol\Http\DefaultRequestHandler
* *is nullable* : Yes
* *default value* : `false`





### Class `ProtocolUpgrader`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-protocolupgrader)



#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerInterface`
* `Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`


#### Method `__construct`

Parameter `serverServiceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgrader
* *is nullable* : No


Parameter `config`



* *type* : array
* *is nullable* : Yes
* *default value* : `NULL`

Parameter `configurator`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgrader
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `upgrade`

Parameter `name`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgrader
* *is nullable* : Yes


Parameter `callbackHanlder`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgrader
* *is nullable* : No


Parameter `client`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgrader
* *is nullable* : No


Parameter `request`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgrader
* *is nullable* : No


Parameter `response`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgrader
* *is nullable* : No




#### Method `getServiceManager`

#### Method `setServiceManager`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgrader
* *is nullable* : No






### Class `ProtocolUpgraderFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-protocolupgraderfactory)



#### Method `__invoke`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderFactory
* *is nullable* : No


Parameter `moreParams`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `setProtocolUpgrader`

Parameter `protocolUpgrader`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderFactory
* *is nullable* : No




#### Method `getProtocolUpgrader`



### Interface `ProtocolUpgraderInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#interface-protocolupgraderinterface)



#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`


#### Method `__construct`

Parameter `serverServiceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface
* *is nullable* : No


Parameter `config`



* *type* : array
* *is nullable* : Yes
* *default value* : `NULL`

Parameter `configurator`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `upgrade`

Parameter `name`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface
* *is nullable* : Yes


Parameter `callbackHanlder`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface
* *is nullable* : No


Parameter `client`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface
* *is nullable* : No


Parameter `request`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface
* *is nullable* : No


Parameter `response`



* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface
* *is nullable* : No






### Class `Request`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-request)



#### Method `__construct`

Parameter `method`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes


Parameter `uri`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes




#### Method `getMethod`

#### Method `getPath`

#### Method `getUri`

#### Method `setHeaders`

Parameter `headers`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : No




#### Method `getHeaders`

#### Method `setPostParams`

Parameter `postParams`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : No




#### Method `getPostParams`

#### Method `setQueryParams`

Parameter `queryParams`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : No




#### Method `getQueryParams`

#### Method `setCookieParams`

Parameter `cookieParams`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : No




#### Method `getCookieParams`

#### Method `setServerParams`

Parameter `serverParams`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : No




#### Method `getServerParams`

#### Method `setParams`

Parameter `params`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : No




#### Method `getParams`

#### Method `getHeader`

Parameter `key`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes


Parameter `default`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `getQuery`

Parameter `key`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes


Parameter `default`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `getPost`

Parameter `key`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes


Parameter `default`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `getCookie`

Parameter `key`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes


Parameter `default`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `getParam`

Parameter `key`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes


Parameter `default`



* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `__toString`

#### Method `toString`



### Class `RequestFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-requestfactory)



#### Method `__invoke`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\RequestFactory
* *is nullable* : No


Parameter `moreParams`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`





### Class `Response`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-response)



#### Implemented Interfaces

* `Gplanchat\EventManager\EventEmitterInterface`


#### Used Traits

* `Gplanchat\EventManager\EventEmitterTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `send`

Parameter `client`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : No




#### Method `setReturnCode`

Parameter `code`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes


Parameter `message`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes




#### Method `setBody`

Parameter `body`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes




#### Method `setHeader`

Parameter `headerName`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes


Parameter `headerValue`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes




#### Method `hasHeader`

Parameter `headerName`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes




#### Method `getHeader`

Parameter `headerName`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes




#### Method `on`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `once`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `removeListener`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes


Parameter `callbackHandler`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : No




#### Method `removeAllListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes




#### Method `getListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes




#### Method `emit`

Parameter `event`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : No


Parameter `params`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `_registerEvent`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes


Parameter `isCalledOnce`



* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : Yes
* *default value* : `false`





### Class `ResponseFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-responsefactory)



#### Method `__invoke`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\ResponseFactory
* *is nullable* : No


Parameter `moreParams`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`





### Class `Server`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-server)

Class Server

#### Implemented Interfaces

* `Gplanchat\Io\Net\Tcp\ServerDecoratorInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\Io\Net\Tcp\ServerInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Gplanchat\PluginManager\PluginAwareInterface`


#### Used Traits

* `Gplanchat\Io\Net\Tcp\ServerDecoratorTrait`
* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\PluginManager\PluginAwareTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : No


Parameter `server`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : No




#### Method `listen`

Parameter `timeout`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : Yes


Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `registerSocket`

Parameter `socket`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : No




#### Method `getResource`

#### Method `setLoop`

Parameter `loop`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : No




#### Method `getLoop`

#### Method `setProtocolUpgrader`

Parameter `protocolUpgrader`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : No




#### Method `getProtocolUpgrader`

#### Method `getDecoratedServer`

#### Method `setDecoratedServer`

Parameter `decorated`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : No




#### Method `on`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `once`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `removeListener`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : Yes


Parameter `callback`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : No




#### Method `removeAllListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : Yes




#### Method `getListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : Yes




#### Method `emit`

Parameter `event`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : No


Parameter `params`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `getServiceManager`

#### Method `setServiceManager`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : No




#### Method `registerPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : Yes


Parameter `plugin`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : No




#### Method `getPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : Yes




#### Method `clearPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Net\Protocol\Http\Server
* *is nullable* : Yes




#### Method `getPlugins`

#### Method `getServiceManager`



### Class `ServerConnectionHandler`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-serverconnectionhandler)



#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface`
* `Gplanchat\Log\LoggerAwareInterface`
* `Psr\Log\LoggerAwareInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\Log\LoggerAwareTrait`


#### Method `__construct`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\ServerConnectionHandler
* *is nullable* : No


Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `__invoke`

Parameter `event`



* *type* : Gplanchat\Io\Net\Protocol\Http\ServerConnectionHandler
* *is nullable* : No


Parameter `client`



* *type* : Gplanchat\Io\Net\Protocol\Http\ServerConnectionHandler
* *is nullable* : No


Parameter `server`



* *type* : Gplanchat\Io\Net\Protocol\Http\ServerConnectionHandler
* *is nullable* : No




#### Method `getServiceManager`

#### Method `setServiceManager`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\ServerConnectionHandler
* *is nullable* : No




#### Method `getLogger`

#### Method `setLogger`

Parameter `logger`



* *type* : Gplanchat\Io\Net\Protocol\Http\ServerConnectionHandler
* *is nullable* : No






### Class `ServerServiceManager`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-serverservicemanager)

Class ServerServiceManager

#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerInterface`


#### Method `__construct`

Parameter `config`



* *type* : array
* *is nullable* : Yes
* *default value* : `NULL`

Parameter `configurator`



* *type* : Gplanchat\Io\Net\Protocol\Http\ServerServiceManager
* *is nullable* : Yes
* *default value* : `NULL`

Parameter `logger`



* *type* : Gplanchat\Io\Net\Protocol\Http\ServerServiceManager
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `getHttpServer`

Parameter ``



* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No




#### Method `getHttpClient`

Parameter ``



* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


Parameter ``



* *type* :  \Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No




#### Method `getRequestHandler`

#### Method `getHttpServerBuilder`

Parameter ``



* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No




#### Method `getDefaultProtocolUpgrader`

Parameter ``



* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


Parameter `$config`



* *type* :  array
* *is nullable* : No
* *default value* : `'='`







