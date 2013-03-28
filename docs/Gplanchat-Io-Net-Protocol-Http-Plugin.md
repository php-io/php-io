Namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`
==========



#### Classes

### Interface `ServerPluginInterface`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#interface-serverplugininterface)



#### Implemented Interfaces

* `Gplanchat\PluginManager\PluginInterface`


#### Method `setServer`

Parameter `server`



* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\ServerPluginInterface
* *is nullable* : No




#### Method `getServer`



### Trait `ServerPluginTrait`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#trait-serverplugintrait)



#### Method `setServer`

Parameter `server`



* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\ServerPluginTrait
* *is nullable* : No




#### Method `getServer`



### Class `WebSocket`

_Declared in namespace `Gplanchat\Io\Net\Protocol\Http\Plugin`_ [Read the docs](Gplanchat-Io-Net-Protocol-Http-Plugin.md#class-websocket)



#### Implemented Interfaces

* `Gplanchat\Io\Net\Protocol\Http\Plugin\ServerPluginInterface`
* `Gplanchat\PluginManager\PluginInterface`
* `Gplanchat\ServiceManager\ServiceManagerAwareInterface`


#### Used Traits

* `Gplanchat\Io\Net\Protocol\Http\Plugin\ServerPluginTrait`
* `Gplanchat\ServiceManager\ServiceManagerAwareTrait`


#### Method `__construct`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\WebSocket
* *is nullable* : No


Parameter `requestHandler`



* *type* : callable
* *is nullable* : No




#### Method `register`

Parameter `server`



* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\WebSocket
* *is nullable* : No




#### Method `setRequestHandler`

Parameter `requestHandler`



* *type* : callable
* *is nullable* : No




#### Method `getRequestHandler`

#### Method `setServer`

Parameter `server`



* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\WebSocket
* *is nullable* : No




#### Method `getServer`

#### Method `getServiceManager`

#### Method `setServiceManager`

Parameter `serviceManager`



* *type* : Gplanchat\Io\Net\Protocol\Http\Plugin\WebSocket
* *is nullable* : No








