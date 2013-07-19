Namespace `Gplanchat\Io\Loop`
==========



## Classes

### Interface `IdleInterface`

_Declared in namespace `Gplanchat\Io\Loop`_ [» Read the docs](Gplanchat-Io-Loop.md#interface-idleinterface)



#### Method `__construct`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No


#### Method `start`



##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `stop`





### Interface `LoopAwareInterface`

_Declared in namespace `Gplanchat\Io\Loop`_ [» Read the docs](Gplanchat-Io-Loop.md#interface-loopawareinterface)



#### Method `getLoop`



#### Method `setLoop`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No




### Trait `LoopAwareTrait`

_Declared in namespace `Gplanchat\Io\Loop`_ [» Read the docs](Gplanchat-Io-Loop.md#trait-loopawaretrait)



#### Method `getLoop`



#### Method `setLoop`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No




### Interface `LoopInterface`

_Declared in namespace `Gplanchat\Io\Loop`_ [» Read the docs](Gplanchat-Io-Loop.md#interface-loopinterface)



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


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`




### Interface `TimerInterface`

_Declared in namespace `Gplanchat\Io\Loop`_ [» Read the docs](Gplanchat-Io-Loop.md#interface-timerinterface)



#### Method `__construct`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No


#### Method `timeout`



##### Parameter `timeout`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `interval`



##### Parameter `timeout`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `repeater`



##### Parameter `startTimeout`


* *type* : 
* *is nullable* : Yes


##### Parameter `repeatTimeout`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `repeat`



#### Method `setRepeatTimeout`



##### Parameter `timeout`


* *type* : 
* *is nullable* : Yes


#### Method `stop`







[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)