Namespace `Gplanchat\Io\Net\Protocol\Http`
==========



## Classes

### Class `Client`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-client)

Class Server

#### Implemented Interfaces

* `Gplanchat\Io\Net\Tcp\ClientDecoratorInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`
* `Gplanchat\Io\Net\Tcp\ClientInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Gplanchat\PluginManager\PluginManagerInterface`


#### Used Traits

* `Gplanchat\Io\Net\Tcp\ClientDecoratorTrait`
* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\PluginManager\PluginManagerTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


#### Method `accept`



##### Parameter `server`


* *type* : Gplanchat\Io\Net\Tcp\ServerInterface
* *is nullable* : No


#### Method `connect`



##### Parameter `socket`


* *type* : Gplanchat\Io\Net\Tcp\SocketInterface
* *is nullable* : No


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `write`



##### Parameter `buffer`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `close`



##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `poll`



#### Method `getResource`



#### Method `setLoop`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No


#### Method `getLoop`



#### Method `getServer`



#### Method `newCallbackHandler`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


##### Parameter `options`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `sendRequest`



##### Parameter `request`


* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : No


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `get`



##### Parameter `uri`


* *type* : 
* *is nullable* : Yes


##### Parameter `params`


* *type* : array
* *is nullable* : No


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `post`



##### Parameter `uri`


* *type* : 
* *is nullable* : Yes


##### Parameter `queryParams`


* *type* : array
* *is nullable* : No


##### Parameter `postParams`


* *type* : array
* *is nullable* : No


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `getDecoratedClient`



#### Method `setDecoratedClient`



##### Parameter `decorated`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


#### Method `on`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `once`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `removeListener`

@abstract

##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `callbackHandler`


* *type* : Gplanchat\EventManager\CallbackHandlerInterface
* *is nullable* : No


#### Method `removeAllListeners`

@abstract

##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


#### Method `getListeners`

@abstract

##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


#### Method `emit`

@abstract

##### Parameter `event`


* *type* : Gplanchat\EventManager\EventInterface
* *is nullable* : No


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `cleanupCallback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


#### Method `registerPlugin`



##### Parameter `plugin`


* *type* : Gplanchat\PluginManager\PluginInterface
* *is nullable* : No


##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `callPlugin`



##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `clearPlugins`



##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


#### Method `getPlugins`



##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


#### Method `getServiceManager`





### Class `ClientServiceManager`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-clientservicemanager)

Class ServerServiceManager

#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerInterface`


#### Method `getHttpClient`



##### Parameter ``


* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter ``


* *type* :  \Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No




### Class `DefaultRequestHandler`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-defaultrequesthandler)

Class DefaultRequestHandler

#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Gplanchat\Io\Net\Protocol\RequestHandlerInterface`
* `Gplanchat\EventManager\EventEmitterInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\EventManager\EventEmitterTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


#### Method `setCallbackHandler`



##### Parameter `callbackHanlder`


* *type* : Gplanchat\EventManager\CallbackHandlerInterface
* *is nullable* : No


#### Method `getCallbackHandler`



#### Method `__invoke`



##### Parameter `event`


* *type* : Gplanchat\EventManager\Event
* *is nullable* : No


##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `buffer`


* *type* : 
* *is nullable* : Yes


##### Parameter `length`


* *type* : 
* *is nullable* : Yes


##### Parameter `isError`


* *type* : 
* *is nullable* : Yes


#### Method `initRequest`



##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `buffer`


* *type* : 
* *is nullable* : Yes


##### Parameter `length`


* *type* : 
* *is nullable* : Yes


#### Method `initResponse`



##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


#### Method `setupUpgrades`



##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `request`


* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : No


##### Parameter `response`


* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : No


#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


#### Method `on`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `once`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `removeListener`

Remove a listener from an event list. This operation consumes lots of resources as long as each priority queue has to be destroyed and re-populated.

##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `callbackHandler`


* *type* : Gplanchat\EventManager\CallbackHandlerInterface
* *is nullable* : No


#### Method `removeAllListeners`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


#### Method `getListeners`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


#### Method `emit`



##### Parameter `event`


* *type* : Gplanchat\EventManager\EventInterface
* *is nullable* : No


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `cleanupCallback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `newCallbackHandler`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


##### Parameter `options`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `_registerEvent`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes


##### Parameter `isCalledOnce`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`




### Class `ProtocolUpgrader`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-protocolupgrader)



#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerInterface`
* `Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`


#### Method `__construct`



##### Parameter `serverServiceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `config`


* *type* : array
* *is nullable* : Yes
* *default value* : `NULL`


##### Parameter `configurator`


* *type* : Gplanchat\ServiceManager\Configurator
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `upgrade`



##### Parameter `name`


* *type* : 
* *is nullable* : Yes


##### Parameter `callbackHanlder`


* *type* : Gplanchat\EventManager\CallbackHandlerInterface
* *is nullable* : No


##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `request`


* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : No


##### Parameter `response`


* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : No


#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No




### Class `ProtocolUpgraderFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-protocolupgraderfactory)



#### Method `__invoke`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `moreParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `setProtocolUpgrader`



##### Parameter `protocolUpgrader`


* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface
* *is nullable* : No


#### Method `getProtocolUpgrader`





### Interface `ProtocolUpgraderInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#interface-protocolupgraderinterface)



#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`


#### Method `__construct`



##### Parameter `serverServiceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `config`


* *type* : array
* *is nullable* : Yes
* *default value* : `NULL`


##### Parameter `configurator`


* *type* : Gplanchat\ServiceManager\Configurator
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `upgrade`



##### Parameter `name`


* *type* : 
* *is nullable* : Yes


##### Parameter `callbackHanlder`


* *type* : Gplanchat\EventManager\CallbackHandlerInterface
* *is nullable* : No


##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `request`


* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : No


##### Parameter `response`


* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : No




### Class `Request`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-request)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Protocol\RequestInterface`


#### Method `__construct`



##### Parameter `method`


* *type* : 
* *is nullable* : Yes


##### Parameter `uri`


* *type* : 
* *is nullable* : Yes


##### Parameter `protocol`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `getMethod`



#### Method `getUri`



##### Parameter `useCached`


* *type* : 
* *is nullable* : Yes
* *default value* : `true`


#### Method `getPath`



#### Method `getProtocol`



#### Method `setHeaders`



##### Parameter `headers`


* *type* : ArrayObject
* *is nullable* : No


#### Method `getHeaders`



#### Method `setPostParams`



##### Parameter `postParams`


* *type* : ArrayObject
* *is nullable* : No


#### Method `getPostParams`



#### Method `setQueryParams`



##### Parameter `queryParams`


* *type* : ArrayObject
* *is nullable* : No


#### Method `getQueryParams`



#### Method `setCookieParams`



##### Parameter `cookieParams`


* *type* : ArrayObject
* *is nullable* : No


#### Method `getCookieParams`



#### Method `setServerParams`



##### Parameter `serverParams`


* *type* : ArrayObject
* *is nullable* : No


#### Method `getServerParams`



#### Method `setParams`



##### Parameter `params`


* *type* : ArrayObject
* *is nullable* : No


#### Method `getParams`



#### Method `getHeader`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `default`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `setHeader`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `value`


* *type* : 
* *is nullable* : Yes


#### Method `getQuery`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `default`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `setQuery`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `value`


* *type* : 
* *is nullable* : Yes


#### Method `getPost`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `default`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `setPost`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `value`


* *type* : 
* *is nullable* : Yes


#### Method `getCookie`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `default`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `setCookie`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `value`


* *type* : 
* *is nullable* : Yes


#### Method `getServer`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `default`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `setServer`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `value`


* *type* : 
* *is nullable* : Yes


#### Method `getParam`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `default`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `setParam`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `value`


* *type* : 
* *is nullable* : Yes


#### Method `__toString`



#### Method `toString`





### Class `RequestParser`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-requestparser)



#### Implemented Interfaces

* `Gplanchat\EventManager\EventEmitterInterface`


#### Used Traits

* `Gplanchat\EventManager\EventEmitterTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `parse`



##### Parameter `buffer`


* *type* : 
* *is nullable* : Yes


##### Parameter `requestObject`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `parseState`



##### Parameter `requestObject`


* *type* : 
* *is nullable* : Yes


##### Parameter `buffer`


* *type* : 
* *is nullable* : Yes


#### Method `parseHeaders`



##### Parameter `requestObject`


* *type* : 
* *is nullable* : Yes


##### Parameter `buffer`


* *type* : 
* *is nullable* : Yes


##### Parameter `offset`


* *type* : 
* *is nullable* : Yes
* *default value* : `0`


#### Method `parseBody`



##### Parameter `requestObject`


* *type* : 
* *is nullable* : Yes


##### Parameter `buffer`


* *type* : 
* *is nullable* : Yes


##### Parameter `offset`


* *type* : 
* *is nullable* : Yes
* *default value* : `0`


#### Method `on`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `once`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `removeListener`

Remove a listener from an event list. This operation consumes lots of resources as long as each priority queue has to be destroyed and re-populated.

##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `callbackHandler`


* *type* : Gplanchat\EventManager\CallbackHandlerInterface
* *is nullable* : No


#### Method `removeAllListeners`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


#### Method `getListeners`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


#### Method `emit`



##### Parameter `event`


* *type* : Gplanchat\EventManager\EventInterface
* *is nullable* : No


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `cleanupCallback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `newCallbackHandler`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


##### Parameter `options`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `_registerEvent`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes


##### Parameter `isCalledOnce`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`




### Class `Response`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-response)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Protocol\ResponseInterface`
* `Gplanchat\EventManager\EventEmitterInterface`


#### Used Traits

* `Gplanchat\EventManager\EventEmitterTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `send`



##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


#### Method `setReturnCode`



##### Parameter `code`


* *type* : 
* *is nullable* : Yes


##### Parameter `message`


* *type* : 
* *is nullable* : Yes


#### Method `setBody`



##### Parameter `body`


* *type* : 
* *is nullable* : Yes


#### Method `setHeader`



##### Parameter `headerName`


* *type* : 
* *is nullable* : Yes


##### Parameter `headerValue`


* *type* : 
* *is nullable* : Yes


#### Method `hasHeader`



##### Parameter `headerName`


* *type* : 
* *is nullable* : Yes


#### Method `getHeader`



##### Parameter `headerName`


* *type* : 
* *is nullable* : Yes


#### Method `on`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `once`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `removeListener`

Remove a listener from an event list. This operation consumes lots of resources as long as each priority queue has to be destroyed and re-populated.

##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `callbackHandler`


* *type* : Gplanchat\EventManager\CallbackHandlerInterface
* *is nullable* : No


#### Method `removeAllListeners`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


#### Method `getListeners`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


#### Method `emit`



##### Parameter `event`


* *type* : Gplanchat\EventManager\EventInterface
* *is nullable* : No


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `cleanupCallback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `newCallbackHandler`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


##### Parameter `options`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `_registerEvent`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes


##### Parameter `isCalledOnce`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`




### Class `Server`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-server)

Class Server

#### Implemented Interfaces

* `Gplanchat\Io\Net\Tcp\ServerDecoratorInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`
* `Gplanchat\Io\Net\Tcp\ServerInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Gplanchat\PluginManager\PluginManagerInterface`


#### Used Traits

* `Gplanchat\Io\Net\Tcp\ServerDecoratorTrait`
* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\PluginManager\PluginManagerTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `server`


* *type* : Gplanchat\Io\Net\Tcp\ServerInterface
* *is nullable* : No


#### Method `listen`



##### Parameter `timeout`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `registerSocket`



##### Parameter `socket`


* *type* : Gplanchat\Io\Net\Tcp\SocketInterface
* *is nullable* : No


#### Method `getResource`



#### Method `setLoop`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No


#### Method `getLoop`



#### Method `setProtocolUpgrader`



##### Parameter `protocolUpgrader`


* *type* : Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface
* *is nullable* : No


#### Method `getProtocolUpgrader`



#### Method `stop`



#### Method `getDecoratedServer`



#### Method `setDecoratedServer`



##### Parameter `decorated`


* *type* : Gplanchat\Io\Net\Tcp\ServerInterface
* *is nullable* : No


#### Method `on`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `once`



##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `removeListener`

@abstract

##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : Gplanchat\EventManager\CallbackHandlerInterface
* *is nullable* : No


#### Method `removeAllListeners`

@abstract

##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


#### Method `getListeners`

@abstract

##### Parameter `eventNameList`


* *type* : 
* *is nullable* : Yes


#### Method `emit`



##### Parameter `event`


* *type* : Gplanchat\EventManager\EventInterface
* *is nullable* : No


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `cleanupCallback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `newCallbackHandler`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


##### Parameter `options`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


#### Method `registerPlugin`



##### Parameter `plugin`


* *type* : Gplanchat\PluginManager\PluginInterface
* *is nullable* : No


##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `callPlugin`



##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `clearPlugins`



##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


#### Method `getPlugins`



##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


#### Method `getServiceManager`





### Class `ServerConnectionHandler`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-serverconnectionhandler)



#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface`
* `Gplanchat\PluginManager\PluginManagerInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\PluginManager\PluginManagerTrait`


#### Method `__construct`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `__invoke`



##### Parameter `event`


* *type* : Gplanchat\EventManager\Event
* *is nullable* : No


##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `server`


* *type* : Gplanchat\Io\Net\Tcp\ServerInterface
* *is nullable* : No


#### Method `setCallback`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `getCallback`



#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


#### Method `registerPlugin`



##### Parameter `plugin`


* *type* : Gplanchat\PluginManager\PluginInterface
* *is nullable* : No


##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `callPlugin`



##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `clearPlugins`



##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


#### Method `getPlugins`



##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes




### Class `ServerServiceManager`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http.md#class-serverservicemanager)

Class ServerServiceManager

#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerInterface`


#### Method `getHttpServer`



##### Parameter ``


* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


#### Method `getHttpClient`



##### Parameter ``


* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter ``


* *type* :  \Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


#### Method `getRequestHandler`



#### Method `getHttpServerBuilder`



##### Parameter ``


* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


#### Method `getDefaultProtocolUpgrader`



##### Parameter ``


* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `$config`


* *type* :  array
* *is nullable* : No
* *default value* : `'='`






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)