Namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`
==========



## Classes

### Class `Client`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-client)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Tcp\ClientInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\PluginManager\PluginManagerInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\Io\Adapter\Libuv\EventManager\EventEmitterTrait`
* `Gplanchat\PluginManager\PluginManagerTrait`
* `Gplanchat\Io\Loop\LoopAwareTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `loop`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\LoopInterface
* *is nullable* : No


##### Parameter `socket`


* *type* : Gplanchat\Io\Net\Tcp\SocketInterface
* *is nullable* : Yes
* *default value* : `NULL`


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


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


#### Method `poll`



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


#### Method `getResource`



#### Method `getServer`



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


#### Method `getLoop`



#### Method `setLoop`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
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




### Class `Ip4`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-ip4)



#### Implemented Interfaces

* `Gplanchat\Io\Net\SocketInterface`
* `Gplanchat\Io\Net\Tcp\SocketInterface`


#### Method `connect`



##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `bind`



##### Parameter `server`


* *type* : Gplanchat\Io\Net\Tcp\ServerInterface
* *is nullable* : No




### Class `Ip6`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-ip6)



#### Implemented Interfaces

* `Gplanchat\Io\Net\SocketInterface`
* `Gplanchat\Io\Net\Tcp\SocketInterface`


#### Method `connect`



##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `bind`



##### Parameter `server`


* *type* : Gplanchat\Io\Net\Tcp\ServerInterface
* *is nullable* : No




### Class `Server`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-server)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Tcp\ServerInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Gplanchat\PluginManager\PluginManagerInterface`


#### Used Traits

* `Gplanchat\Io\Adapter\Libuv\EventManager\EventEmitterTrait`
* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\PluginManager\PluginManagerTrait`
* `Gplanchat\Io\Loop\LoopAwareTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `loop`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\LoopInterface
* *is nullable* : No


##### Parameter `socket`


* *type* : Gplanchat\Io\Net\Tcp\SocketInterface
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `registerSocket`



##### Parameter `socket`


* *type* : Gplanchat\Io\Net\Tcp\SocketInterface
* *is nullable* : No


#### Method `listen`



##### Parameter `timeout`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `stop`



#### Method `getResource`



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


#### Method `getLoop`



#### Method `setLoop`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No


#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


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






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)