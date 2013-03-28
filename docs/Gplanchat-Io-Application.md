Namespace `Gplanchat\Io\Application`
==========



#### Classes

### Class `Application`

_Declared in namespace `Gplanchat\Io\Application`_ [Read the docs](Gplanchat-Io-Application.md#class-application)

Class ApplicationLoop

#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`
* `Gplanchat\Log\LoggerAwareInterface`
* `Psr\Log\LoggerAwareInterface`
* `Gplanchat\EventManager\EventEmitterInterface`
* `Gplanchat\PluginManager\PluginAwareInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`
* `Gplanchat\Log\LoggerAwareTrait`
* `Gplanchat\EventManager\EventEmitterTrait`
* `Gplanchat\PluginManager\PluginAwareTrait`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__construct`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes
* *default value* : `NULL`

Parameter `logger`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `init`

Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `bootstrap`

#### Method `run`

#### Method `setCurrentLoop`

Parameter `loop`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : No




#### Method `getCurrentLoop`

#### Method `__call`

Parameter `method`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes


Parameter `arguments`



* *type* : array
* *is nullable* : No




#### Method `getStorage`

Parameter `key`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes




#### Method `setStorage`

Parameter `key`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes


Parameter `value`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes




#### Method `getServiceManager`

#### Method `setServiceManager`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : No




#### Method `getLogger`

#### Method `setLogger`

Parameter `logger`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : No




#### Method `on`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `once`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `removeListener`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes


Parameter `callbackHandler`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : No




#### Method `removeAllListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes




#### Method `getListeners`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes




#### Method `emit`

Parameter `event`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : No


Parameter `params`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `registerPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes


Parameter `plugin`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : No




#### Method `getPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes




#### Method `clearPlugin`

Parameter `namespace`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes




#### Method `getPlugins`

#### Method `_registerEvent`

Parameter `eventNameList`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes


Parameter `listener`



* *type* : callable
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes


Parameter `isCalledOnce`



* *type* : Gplanchat\Io\Application\Application
* *is nullable* : Yes
* *default value* : `false`



#### Method `getLoop`

#### Method `getTimer`

#### Method `getIdle`

#### Method `getTcpClient`

Parameter ``



* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


Parameter ``



* *type* :  \Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No


Parameter `$socket`



* *type* :  \Gplanchat\Io\Net\SocketInterface
* *is nullable* : No
* *default value* : `'='`



#### Method `getTcpServer`

Parameter ``



* *type* : \Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


Parameter ``



* *type* :  \Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No




#### Method `getTcpIp4`

Parameter ``



* *type* : 
* *is nullable* : No




#### Method `getTcpIp6`

Parameter ``



* *type* : 
* *is nullable* : No






### Class `DefaultServiceManager`

_Declared in namespace `Gplanchat\Io\Application`_ [Read the docs](Gplanchat-Io-Application.md#class-defaultservicemanager)

Basic loop class. A loop is designed to run event-driven code, the loop runsuntil there are registered I/O loops.

#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerTrait`


#### Method `__construct`

Parameter `config`



* *type* : array
* *is nullable* : Yes
* *default value* : `NULL`

Parameter `configurator`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `NULL`

Parameter `logger`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `get`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `constructorParams`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`

Parameter `ignoreInexistent`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`

Parameter `ignoreChildren`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `has`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `ignoreChildren`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `isAlias`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes




#### Method `isInvokable`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes




#### Method `isSingleton`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes




#### Method `invoke`

Parameter `className`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `constructorParams`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `invokeFactory`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `extraParams`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `getAlias`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes




#### Method `getFactory`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes




#### Method `registerAlias`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `alias`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `allowOverride`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `registerInvokable`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `invokable`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `allowOverride`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `registerSingleton`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `singleton`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `allowOverride`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `registerFactory`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `factory`



* *type* : callable
* *is nullable* : No


Parameter `allowOverride`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `attachChild`

Parameter `childServiceManager`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `detachChild`

Parameter `childServiceManager`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : No




#### Method `__invoke`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes


Parameter `constructorParams`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`

Parameter `ignoreInexistent`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`

Parameter `ignoreChildren`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `isFactory`

Parameter `serviceName`



* *type* : Gplanchat\Io\Application\DefaultServiceManager
* *is nullable* : Yes








