Namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`
==========



## Classes

### Class `Request`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-request)



#### Implemented Interfaces

* `Iterator`
* `Traversable`
* `Countable`
* `ArrayAccess`
* `Serializable`


### Constant `IT_MODE_LIFO`

*Value* : `2`



### Constant `IT_MODE_FIFO`

*Value* : `0`



### Constant `IT_MODE_DELETE`

*Value* : `1`



### Constant `IT_MODE_KEEP`

*Value* : `0`





### Class `RequestFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-requestfactory)



#### Method `__invoke`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `moreParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`




### Class `RequestHandler`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-requesthandler)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Protocol\RequestHandlerInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\Io\Net\Protocol\Http\Upgrade\ProtocolUpgradeAwareInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\EventManager\EventEmitterTrait`


### Constant `SECURITY_GUID`

*Value* : `'258EAFA5-E914-47DA-95CA-C5AB0DC85B11'`



### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


#### Method `__invoke`



##### Parameter `event`


* *type* : Gplanchat\EventManager\Event
* *is nullable* : No


##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `input`


* *type* : 
* *is nullable* : Yes


##### Parameter `length`


* *type* : 
* *is nullable* : Yes


##### Parameter `isError`


* *type* : 
* *is nullable* : Yes


#### Method `setCallbackHandler`



##### Parameter `callbackHandler`


* *type* : Gplanchat\EventManager\CallbackHandlerInterface
* *is nullable* : No


#### Method `getCallbackHandler`



#### Method `upgrade`

Process WebSocket handshake

##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `request`


* *type* : Gplanchat\Io\Net\Protocol\Http\Request
* *is nullable* : No


##### Parameter `response`


* *type* : Gplanchat\Io\Net\Protocol\Http\Response
* *is nullable* : No


#### Method `_parseInt`



##### Parameter `offset`


* *type* : 
* *is nullable* : Yes


##### Parameter `length`


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


#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


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




### Class `RequestHandlerFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-requesthandlerfactory)



#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`


#### Method `__construct`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `__invoke`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `moreParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


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




### Class `Response`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-response)



#### Implemented Interfaces

* `Iterator`
* `Traversable`
* `Countable`
* `ArrayAccess`
* `Serializable`
* `Gplanchat\EventManager\EventEmitterInterface`


#### Used Traits

* `Gplanchat\EventManager\EventEmitterTrait`


### Constant `IT_MODE_LIFO`

*Value* : `2`



### Constant `IT_MODE_FIFO`

*Value* : `0`



### Constant `IT_MODE_DELETE`

*Value* : `1`



### Constant `IT_MODE_KEEP`

*Value* : `0`



### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `send`



##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


#### Method `addMessage`



##### Parameter `message`


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




### Class `ResponseFactory`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-responsefactory)



#### Method `__invoke`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `moreParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`




### Class `ServerServiceManager`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Upgrade-WebSocket.md#class-serverservicemanager)



#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerTrait`


#### Method `__construct`



##### Parameter `config`


* *type* : array
* *is nullable* : Yes
* *default value* : `NULL`


##### Parameter `configurator`


* *type* : Gplanchat\ServiceManager\Configurator
* *is nullable* : Yes
* *default value* : `NULL`


##### Parameter `logger`


* *type* : Psr\Log\LoggerInterface
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `get`

Get the service instance

##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


##### Parameter `constructorParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `ignoreInexistent`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`


##### Parameter `ignorePeering`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`


#### Method `has`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


##### Parameter `ignorePeering`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`


#### Method `isAlias`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


#### Method `isInvokable`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


#### Method `isSingleton`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


#### Method `invoke`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


##### Parameter `constructorParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `invokeFactory`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


##### Parameter `extraParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `getAlias`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


#### Method `registerAlias`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


##### Parameter `alias`


* *type* : 
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerInvokable`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


##### Parameter `invokable`


* *type* : 
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerSingleton`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


##### Parameter `singleton`


* *type* : 
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerFactory`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


##### Parameter `factory`


* *type* : callable
* *is nullable* : No


##### Parameter `allowOverride`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerInitializer`

Register a new service initializer

##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


##### Parameter `initializer`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `registerPeeringServiceManager`



##### Parameter `childManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `peering`


* *type* : 
* *is nullable* : Yes


#### Method `__invoke`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes


##### Parameter `constructorParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `ignoreInexistent`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`


##### Parameter `ignorePeering`


* *type* : 
* *is nullable* : Yes
* *default value* : `false`


#### Method `isFactory`



##### Parameter `serviceName`


* *type* : 
* *is nullable* : Yes






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)