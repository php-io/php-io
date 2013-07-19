Namespace `Gplanchat\Io\Adapter\Libuv\Net\Udp`
==========



## Classes

### Class `Client`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Udp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Udp.md#class-client)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Udp\ClientInterface`
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


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : No


##### Parameter `loop`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : No


##### Parameter `socket`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `send`



##### Parameter `buffer`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


##### Parameter `socket`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `getResource`



#### Method `setSocket`



##### Parameter `socket`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : No


#### Method `getSocket`



#### Method `on`



##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `once`



##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `removeListener`

Remove a listener from an event list. This operation consumes lots of resources as long as each priority queue has to be destroyed and re-populated.

##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


##### Parameter `callbackHandler`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : No


#### Method `removeAllListeners`



##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


#### Method `getListeners`



##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


#### Method `emit`



##### Parameter `event`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
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


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : No


#### Method `registerPlugin`



##### Parameter `plugin`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : No


##### Parameter `namespace`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


##### Parameter `priority`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `callPlugin`



##### Parameter `namespace`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `clearPlugins`



##### Parameter `namespace`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


#### Method `getPlugins`



##### Parameter `namespace`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : No


#### Method `_registerEvent`



##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes


##### Parameter `isCalledOnce`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Client
* *is nullable* : Yes
* *default value* : `false`




### Class `Ip4`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Udp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Udp.md#class-ip4)



#### Implemented Interfaces

* `Gplanchat\Io\Net\SocketInterface`
* `Gplanchat\Io\Net\Udp\SocketInterface`


#### Method `send`



##### Parameter `client`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Ip4
* *is nullable* : No


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `bind`



##### Parameter `server`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Ip4
* *is nullable* : No




### Class `Ip6`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Udp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Udp.md#class-ip6)



#### Implemented Interfaces

* `Gplanchat\Io\Net\SocketInterface`
* `Gplanchat\Io\Net\Udp\SocketInterface`


#### Method `send`



##### Parameter `client`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Ip6
* *is nullable* : No


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `bind`



##### Parameter `server`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Ip6
* *is nullable* : No




### Class `Server`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Udp`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Udp.md#class-server)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Udp\ServerInterface`
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


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : No


##### Parameter `loop`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : No


##### Parameter `socket`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `__destruct`



#### Method `registerSocket`



##### Parameter `socket`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : No


#### Method `recv`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `stop`



#### Method `getResource`



#### Method `on`



##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `once`



##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `removeListener`

Remove a listener from an event list. This operation consumes lots of resources as long as each priority queue has to be destroyed and re-populated.

##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes


##### Parameter `callbackHandler`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : No


#### Method `removeAllListeners`



##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes


#### Method `getListeners`



##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes


#### Method `emit`



##### Parameter `event`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
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


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : No


#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : No


#### Method `registerPlugin`



##### Parameter `plugin`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : No


##### Parameter `namespace`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes


##### Parameter `priority`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `callPlugin`



##### Parameter `namespace`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `clearPlugins`



##### Parameter `namespace`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes


#### Method `getPlugins`



##### Parameter `namespace`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes


#### Method `_registerEvent`



##### Parameter `eventNameList`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes


##### Parameter `listener`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes


##### Parameter `isCalledOnce`


* *type* : Gplanchat\Io\Adapter\Libuv\Net\Udp\Server
* *is nullable* : Yes
* *default value* : `false`






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)