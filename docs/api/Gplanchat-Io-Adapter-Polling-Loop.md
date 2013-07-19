Namespace `Gplanchat\Io\Adapter\Polling\Loop`
==========



## Classes

### Class `Loop`

_Declared in namespace `Gplanchat\Io\Adapter\Polling\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Polling-Loop.md#class-loop)

Basic loop class. A loop is designed to run event-driven code, the loop runs until there are registered I/O loops.

#### Implemented Interfaces

* `Gplanchat\Io\Loop\LoopInterface`


#### Method `__construct`



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


* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `addReadStream`



##### Parameter `stream`


* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `addWriteStream`



##### Parameter `stream`


* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes


##### Parameter `listener`


* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes


#### Method `removeReadStream`



##### Parameter `stream`


* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes


#### Method `removeWriteStream`



##### Parameter `stream`


* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes


#### Method `removeStream`



##### Parameter `stream`


* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes


#### Method `getNextEventMicroTime`





### Interface `LoopInterface`

_Declared in namespace `Gplanchat\Io\Adapter\Polling\Loop`_ [» Read the docs](Gplanchat-Io-Adapter-Polling-Loop.md#interface-loopinterface)



#### Implemented Interfaces

* `Gplanchat\Io\Loop\LoopInterface`


#### Method `getResource`

Returns the uv_loop, for direct operations on the loop





[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)