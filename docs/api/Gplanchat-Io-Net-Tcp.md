Namespace `Gplanchat\Io\Net\Tcp`
==========



## Classes

### Interface `ClientDecoratorInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#interface-clientdecoratorinterface)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Tcp\ClientInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`
* `Gplanchat\EventManager\EventEmitterInterface`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `getDecoratedClient`



#### Method `setDecoratedClient`



##### Parameter `decorated`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No




### Trait `ClientDecoratorTrait`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#trait-clientdecoratortrait)



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




### Interface `ClientInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#interface-clientinterface)



#### Implemented Interfaces

* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





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


#### Method `poll`



#### Method `close`



##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `getResource`



#### Method `getServer`





### Interface `ServerDecoratorInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#interface-serverdecoratorinterface)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Tcp\ServerInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`
* `Gplanchat\EventManager\EventEmitterInterface`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `getDecoratedServer`



#### Method `setDecoratedServer`



##### Parameter `decorated`


* *type* : Gplanchat\Io\Net\Tcp\ServerInterface
* *is nullable* : No




### Trait `ServerDecoratorTrait`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#trait-serverdecoratortrait)



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


#### Method `newCallbackHandler`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


##### Parameter `options`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


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




### Interface `ServerInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#interface-serverinterface)



#### Implemented Interfaces

* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





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





### Class `SocketFactory`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#class-socketfactory)



#### Method `__invoke`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `moreParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`




### Interface `SocketInterface`

_Declared in namespace `Gplanchat\Io\Net\Tcp`_ [» Read the docs](Gplanchat-Io-Net-Tcp.md#interface-socketinterface)



#### Implemented Interfaces

* `Gplanchat\Io\Net\SocketInterface`


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






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)