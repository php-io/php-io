Namespace `Gplanchat\Io\Adapter\Polling\Loop`
==========



#### Classes

### Class `Loop`

_Declared in namespace `Gplanchat\Io\Adapter\Polling\Loop`_ [Read the docs](Gplanchat-Io-Adapter-Polling-Loop.md#class-loop)

Basic loop class. A loop is designed to run event-driven code, the loop runsuntil there are registered I/O loops.

#### Implemented Interfaces

* `Gplanchat\Io\Loop\LoopInterface`


#### Method `__destruct`

#### Method `init`

#### Method `cleanup`

#### Method `run`

#### Method `runOnce`

#### Method `stop`

Parameter `signal`



* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes
* *default value* : `NULL`



#### Method `addReadStream`

Parameter `stream`



* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes


Parameter `callback`



* *type* : callable
* *is nullable* : No




#### Method `addWriteStream`

Parameter `stream`



* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes


Parameter `listener`



* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes




#### Method `removeReadStream`

Parameter `stream`



* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes




#### Method `removeWriteStream`

Parameter `stream`



* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes




#### Method `removeStream`

Parameter `stream`



* *type* : Gplanchat\Io\Adapter\Polling\Loop\Loop
* *is nullable* : Yes








