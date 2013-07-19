Namespace `Gplanchat\Io\Adapter\Libuv\Loop`
==========



## Classes

### Class `Idle`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#class-idle)



#### Implemented Interfaces

* `Gplanchat\Io\Loop\IdleInterface`


#### Method `__construct`



##### Parameter `loop`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\Idle
* *is nullable* : No


#### Method `start`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `stop`





### Class `Loop`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#class-loop)

Basic loop class. A loop is designed to run event-driven code, the loop runs until there are registered I/O loops.

#### Implemented Interfaces

* `Gplanchat\Io\Adapter\Libuv\Loop\LoopInterface`
* `Gplanchat\Io\Loop\LoopInterface`


#### Method `getDefaultInstance`

Returns the singleton instance, using the default uv_loop resource

#### Method `__destruct`



#### Method `init`

Initialize the loop

#### Method `cleanup`

Cleans up the loop

#### Method `run`

Runs the loop infinitely

#### Method `runOnce`

Runs the loop only once

#### Method `stop`

Stops the loop (mainly in case the loop would have been run infinitely)

##### Parameter `signal`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\Loop
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `getResource`

Returns the uv_loop, for direct operations on the loop



### Interface `LoopInterface`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#interface-loopinterface)



#### Implemented Interfaces

* `Gplanchat\Io\Loop\LoopInterface`


#### Method `getResource`

Returns the uv_loop, for direct operations on the loop



### Class `Timer`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Loop.md#class-timer)



#### Implemented Interfaces

* `Gplanchat\Io\Loop\TimerInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`


#### Used Traits

* `Gplanchat\Io\Loop\LoopAwareTrait`


#### Method `__construct`



##### Parameter `loop`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\Timer
* *is nullable* : No


#### Method `_registerTimer`



##### Parameter `startTimeout`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\Timer
* *is nullable* : Yes


##### Parameter `repeatTimeout`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\Timer
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `timeout`



##### Parameter `timeout`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\Timer
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `interval`



##### Parameter `timeout`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\Timer
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `repeater`



##### Parameter `startTimeout`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\Timer
* *is nullable* : Yes


##### Parameter `repeatTimeout`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\Timer
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `repeat`



#### Method `setRepeatTimeout`



##### Parameter `timeout`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\Timer
* *is nullable* : Yes


#### Method `stop`



#### Method `getLoop`



#### Method `setLoop`



##### Parameter `loop`


* *type* : Gplanchat\Io\Adapter\Libuv\Loop\Timer
* *is nullable* : No






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)