Namespace `Gplanchat\Io\Application`
==========



## Classes

### Class `Application`

_Declared in namespace `Gplanchat\Io\Application`_ [» Read the docs](Gplanchat-Io-Application.md#class-application)

Class ApplicationLoop

#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Psr\Log\LoggerAwareInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\PluginManager\PluginManagerInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Psr\Log\LoggerAwareTrait`
* `Gplanchat\EventManager\EventEmitterTrait`
* `Gplanchat\PluginManager\PluginManagerTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes
* *default value* : `NULL`


##### Parameter `logger`


* *type* : Psr\Log\LoggerInterface
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `init`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `bootstrap`



#### Method `run`



#### Method `setCurrentLoop`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No


#### Method `getCurrentLoop`



#### Method `__call`



##### Parameter `method`


* *type* : 
* *is nullable* : Yes


##### Parameter `arguments`


* *type* : array
* *is nullable* : No


#### Method `getStorage`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


#### Method `setStorage`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `value`


* *type* : 
* *is nullable* : Yes


#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


#### Method `setLogger`

Sets a logger.

##### Parameter `logger`


* *type* : Psr\Log\LoggerInterface
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


#### Method `getLoop`



#### Method `getTimer`



#### Method `getIdle`



#### Method `getTcpClient`



##### Parameter ``


* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter ``


* *type* :  \Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No


##### Parameter `$socket`


* *type* :  \Gplanchat\Io\Net\SocketInterface
* *is nullable* : No
* *default value* : `'='`


#### Method `getTcpServer`



##### Parameter ``


* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter ``


* *type* :  \Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No


#### Method `getTcpIp4`



##### Parameter ``


* *type* : 
* *is nullable* : No


#### Method `getTcpIp6`



##### Parameter ``


* *type* : 
* *is nullable* : No






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)