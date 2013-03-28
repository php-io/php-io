Namespace `Gplanchat\Io\Adapter\Libuv`
==========



#### Classes

### Class `DefaultServiceManager`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv`_ [Read the docs](Gplanchat-Io-Adapter-Libuv.md#class-defaultservicemanager)

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



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `NULL`

Parameter `logger`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `get`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `constructorParams`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`

Parameter `ignoreInexistent`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`

Parameter `ignoreChildren`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `has`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `ignoreChildren`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `isAlias`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes




#### Method `isInvokable`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes




#### Method `isSingleton`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes




#### Method `invoke`

Parameter `className`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `constructorParams`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `invokeFactory`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `extraParams`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`



#### Method `getAlias`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes




#### Method `getFactory`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes




#### Method `registerAlias`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `alias`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `allowOverride`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `registerInvokable`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `invokable`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `allowOverride`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `registerSingleton`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `singleton`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `allowOverride`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `registerFactory`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `factory`



* *type* : callable
* *is nullable* : No


Parameter `allowOverride`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `attachChild`

Parameter `childServiceManager`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : No


Parameter `priority`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `detachChild`

Parameter `childServiceManager`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : No




#### Method `__invoke`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes


Parameter `constructorParams`



* *type* : array
* *is nullable* : No
* *default value* : `array (
)`

Parameter `ignoreInexistent`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`

Parameter `ignoreChildren`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes
* *default value* : `false`



#### Method `isFactory`

Parameter `serviceName`



* *type* : Gplanchat\Io\Adapter\Libuv\DefaultServiceManager
* *is nullable* : Yes








