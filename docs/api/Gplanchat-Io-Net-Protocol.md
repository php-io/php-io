Namespace `Gplanchat\Io\Net\Protocol`
==========



## Classes

### Interface `ConnectionHandlerInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-connectionhandlerinterface)



#### Method `__invoke`



##### Parameter `event`


* *type* : Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface
* *is nullable* : No


##### Parameter `client`


* *type* : Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface
* *is nullable* : No


##### Parameter `server`


* *type* : Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface
* *is nullable* : No




### Interface `RequestHandlerInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-requesthandlerinterface)



#### Implemented Interfaces

* `Gplanchat\EventManager\EventEmitterInterface`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__invoke`



##### Parameter `event`


* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : No


##### Parameter `client`


* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : No


##### Parameter `buffer`


* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : Yes


##### Parameter `length`


* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : Yes


##### Parameter `isError`


* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : Yes


#### Method `setCallbackHandler`



##### Parameter `callbackHandler`


* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : No


#### Method `getCallbackHandler`





### Interface `RequestInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-requestinterface)



#### Method `setParams`



##### Parameter `params`


* *type* : Gplanchat\Io\Net\Protocol\RequestInterface
* *is nullable* : No


#### Method `getParams`



#### Method `getParam`



##### Parameter `key`


* *type* : Gplanchat\Io\Net\Protocol\RequestInterface
* *is nullable* : Yes


##### Parameter `default`


* *type* : Gplanchat\Io\Net\Protocol\RequestInterface
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `setParam`



##### Parameter `key`


* *type* : Gplanchat\Io\Net\Protocol\RequestInterface
* *is nullable* : Yes


##### Parameter `value`


* *type* : Gplanchat\Io\Net\Protocol\RequestInterface
* *is nullable* : Yes




### Interface `ResponseInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [» Read the docs](Gplanchat-Io-Net-Protocol.md#interface-responseinterface)



#### Implemented Interfaces

* `Gplanchat\EventManager\EventEmitterInterface`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `send`



##### Parameter `client`


* *type* : Gplanchat\Io\Net\Protocol\ResponseInterface
* *is nullable* : No






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)