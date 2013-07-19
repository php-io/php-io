Namespace `Gplanchat\Io\Net\Protocol`
==========



## Classes

### Interface `ConnectionHandlerInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-connectionhandlerinterface)



#### Method `__invoke`



##### Parameter `event`


* *type* : Gplanchat\EventManager\Event
* *is nullable* : No


##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `server`


* *type* : Gplanchat\Io\Net\Tcp\ServerInterface
* *is nullable* : No




### Interface `RequestHandlerInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-requesthandlerinterface)



#### Implemented Interfaces

* `Gplanchat\EventManager\EventEmitterInterface`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__invoke`



##### Parameter `event`


* *type* : Gplanchat\EventManager\Event
* *is nullable* : No


##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No


##### Parameter `buffer`


* *type* : 
* *is nullable* : Yes


##### Parameter `length`


* *type* : 
* *is nullable* : Yes


##### Parameter `isError`


* *type* : 
* *is nullable* : Yes


#### Method `setCallbackHandler`



##### Parameter `callbackHandler`


* *type* : Gplanchat\EventManager\CallbackHandlerInterface
* *is nullable* : No


#### Method `getCallbackHandler`





### Interface `RequestInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-requestinterface)



#### Method `setParams`



##### Parameter `params`


* *type* : ArrayObject
* *is nullable* : No


#### Method `getParams`



#### Method `getParam`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `default`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `setParam`



##### Parameter `key`


* *type* : 
* *is nullable* : Yes


##### Parameter `value`


* *type* : 
* *is nullable* : Yes




### Interface `ResponseInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-responseinterface)



#### Implemented Interfaces

* `Gplanchat\EventManager\EventEmitterInterface`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `send`



##### Parameter `client`


* *type* : Gplanchat\Io\Net\Tcp\ClientInterface
* *is nullable* : No






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)