Namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`
==========



#### Classes

### Class `Client`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-client)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Tcp\ClientInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\PluginManager\PluginAwareInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\EventManager\EventEmitterTrait`
* `Gplanchat\PluginManager\PluginAwareTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : No


Parameter `loop`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : No


Parameter `socket`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes
* *default value* : `NULL`

Parameter `callback`



* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `accept`

Parameter `server`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : No




#### Method `connect`

Parameter `socket`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : No


Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `poll`

#### Method `write`

Parameter `buffer`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
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



#### Method `getResource`

#### Method `setLoop`

Parameter `loop`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : No




#### Method `getLoop`

#### Method `getServer`

#### Method `on`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `once`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `removeListener`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes


Parameter `callbackHandler`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : No




#### Method `removeAllListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes




#### Method `getListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes




#### Method `emit`

Parameter `event`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : No


Parameter `params`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `registerPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes


Parameter `plugin`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : No




#### Method `getPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes




#### Method `clearPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes




#### Method `getPlugins`

#### Method `getServiceManager`

#### Method `setServiceManager`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : No




#### Method `_registerEvent`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes


Parameter `isCalledOnce`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Client
* *is nullable* : Yes
* *default value* : `false`





### Class `Ip4`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-ip4)



#### Implemented Interfaces

* `Gplanchat\Io\Net\SocketInterface`


### Constant `TRANSPORT_TCP`

*Value* : `'tcp'`



### Constant `TRANSPORT_UDP`

*Value* : `'udp'`



### Constant `TRANSPORT_TLS`

*Value* : `'tls'`



### Constant `TRANSPORT_SSl`

*Value* : `'ssl'`





#### Method `connect`

Parameter `client`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Ip4
* *is nullable* : No


Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `bind`

Parameter `server`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Ip4
* *is nullable* : No






### Class `Ip6`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-ip6)



#### Implemented Interfaces

* `Gplanchat\Io\Net\SocketInterface`


### Constant `TRANSPORT_TCP`

*Value* : `'tcp'`



### Constant `TRANSPORT_UDP`

*Value* : `'udp'`



### Constant `TRANSPORT_TLS`

*Value* : `'tls'`



### Constant `TRANSPORT_SSl`

*Value* : `'ssl'`





#### Method `connect`

Parameter `client`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Ip6
* *is nullable* : No


Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `bind`

Parameter `server`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Ip6
* *is nullable* : No






### Class `Server`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Net\Tcp`_ [Read the docs](Gplanchat-Io-Adapter-Libuv-Net-Tcp.md#class-server)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Tcp\ServerInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Gplanchat\PluginManager\PluginAwareInterface`


#### Used Traits

* `Gplanchat\EventManager\EventEmitterTrait`
* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\PluginManager\PluginAwareTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : No


Parameter `loop`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : No


Parameter `socket`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `registerSocket`

Parameter `socket`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : No




#### Method `listen`

Parameter `timeout`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes


Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `getResource`

#### Method `setLoop`

Parameter `loop`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : No




#### Method `getLoop`

#### Method `on`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `once`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `removeListener`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes


Parameter `callbackHandler`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : No




#### Method `removeAllListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes




#### Method `getListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes




#### Method `emit`

Parameter `event`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : No


Parameter `params`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `getServiceManager`

#### Method `setServiceManager`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : No




#### Method `registerPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes


Parameter `plugin`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : No




#### Method `getPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes




#### Method `clearPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes




#### Method `getPlugins`

#### Method `_registerEvent`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes


Parameter `isCalledOnce`



* *type* : Gplanchat\Io\Adapter\Libuv\Net\Tcp\Server
* *is nullable* : Yes
* *default value* : `false`







