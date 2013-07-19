Namespace `Gplanchat\Io\Adapter\Libuv\EventManager`
==========



## Classes

### Class `CallbackHandler`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\EventManager`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-EventManager.md#class-callbackhandler)



#### Implemented Interfaces

* `Gplanchat\EventManager\CallbackHandlerInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`


#### Used Traits

* `Gplanchat\EventManager\CallbackHandlerTrait`
* `Gplanchat\Io\Loop\LoopAwareTrait`


#### Method `__construct`



##### Parameter `loop`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\LoopInterface
* *is nullable* : No


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


##### Parameter `data`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `call`



##### Parameter `parameters`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `initData`



##### Parameter `datas`


* *type* : array
* *is nullable* : No


#### Method `setData`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `value`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `getData`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `default`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `__invoke`



#### Method `setCallback`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `getCallback`



#### Method `getLoop`



#### Method `setLoop`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No




### Trait `EventEmitterTrait`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\EventManager`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-EventManager.md#trait-eventemittertrait)



#### Used Traits

* `Gplanchat\EventManager\EventEmitterTrait`


#### Method `getLoop`



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






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)