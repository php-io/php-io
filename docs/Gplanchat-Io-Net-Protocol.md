Namespace `Gplanchat\Io\Net\Protocol`
==========



#### Classes

### Interface `ConnectionHandlerInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [Read the docs](Gplanchat-Io-Net-Protocol.md#interface-connectionhandlerinterface)



#### Method `__invoke`

Parameter `event`



* *type* : Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface
* *is nullable* : No


Parameter `client`



* *type* : Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface
* *is nullable* : No


Parameter `server`



* *type* : Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface
* *is nullable* : No






### Interface `RequestHandlerInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol`_ [Read the docs](Gplanchat-Io-Net-Protocol.md#interface-requesthandlerinterface)



#### Implemented Interfaces

* `Gplanchat\EventManager\EventEmitterInterface`


### Constant `DEFAULT_PRIORITY`

*Value* : `1`





#### Method `__invoke`

Parameter `event`



* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : No


Parameter `client`



* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : No


Parameter `buffer`



* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : Yes


Parameter `length`



* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : Yes


Parameter `isError`



* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : Yes




#### Method `setCallbackHandler`

Parameter `callbackHanlder`



* *type* : Gplanchat\Io\Net\Protocol\RequestHandlerInterface
* *is nullable* : No




#### Method `getCallbackHandler`





