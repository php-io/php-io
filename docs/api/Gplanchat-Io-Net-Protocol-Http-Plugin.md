Namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`
==========



## Classes

### Class `Server`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#class-server)



#### Implemented Interfaces

* `Gplanchat\Io\Application\Plugin\PluginInterface`
* `Gplanchat\PluginManager\PluginInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`


#### Used Traits

* `Gplanchat\Io\Application\Plugin\PluginTrait`
* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`


#### Method `__construct`



##### Parameter `requestHandler`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


##### Parameter `serviceManager`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\Server
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `register`



##### Parameter `application`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\Server
* *is nullable* : No


#### Method `setRequestHandler`



##### Parameter `requestHandler`


* *type* : callable
* *is nullable* : No


#### Method `getRequestHandler`



#### Method `__invoke`



##### Parameter `namespace`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\Server
* *is nullable* : Yes


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `setApplication`



##### Parameter `application`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\Server
* *is nullable* : No


#### Method `getApplication`



#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\Server
* *is nullable* : No




### Interface `ServerPluginInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#interface-serverplugininterface)



#### Implemented Interfaces

* `Gplanchat\PluginManager\PluginInterface`


#### Method `setServer`



##### Parameter `server`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\ServerPluginInterface
* *is nullable* : No


#### Method `getServer`





### Trait `ServerPluginTrait`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#trait-serverplugintrait)



#### Method `setServer`



##### Parameter `server`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\ServerPluginTrait
* *is nullable* : No


#### Method `getServer`





### Class `WebSocket`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [» Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#class-websocket)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Protocol\Http\Plugin\ServerPluginInterface`
* `Gplanchat\PluginManager\PluginInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`


#### Used Traits

* `Gplanchat\Io\Net\Protocol\Http\Plugin\ServerPluginTrait`
* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`


#### Method `__construct`



##### Parameter `serviceManager`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\WebSocket
* *is nullable* : Yes
* *default value* : `NULL`


##### Parameter `requestHandler`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `register`



##### Parameter `server`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\WebSocket
* *is nullable* : No


#### Method `setRequestHandler`



##### Parameter `requestHandler`


* *type* : callable
* *is nullable* : No


#### Method `getRequestHandler`



#### Method `__invoke`



##### Parameter `namespace`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\WebSocket
* *is nullable* : Yes


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `setServer`



##### Parameter `server`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\WebSocket
* *is nullable* : No


#### Method `getServer`



#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\WebSocket
* *is nullable* : No






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)