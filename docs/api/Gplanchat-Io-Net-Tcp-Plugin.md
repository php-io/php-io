Namespace `Gplanchat\Io\Net\Tcp\Plugin`
==========



## Classes

### Class `Server`

_Declared in namespace `Gplanchat\Io\Net\Tcp\Plugin`_ [» Read the docs](Gplanchat-Io-Net-Tcp-Plugin.md#class-server)



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


* *type* : Gplanchat\Io\Net\Tcp\Plugin\Server
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `register`



##### Parameter `application`


* *type* : Gplanchat\Io\Net\Tcp\Plugin\Server
* *is nullable* : No


#### Method `setRequestHandler`



##### Parameter `requestHandler`


* *type* : callable
* *is nullable* : No


#### Method `getRequestHandler`



#### Method `__invoke`



##### Parameter `namespace`


* *type* : Gplanchat\Io\Net\Tcp\Plugin\Server
* *is nullable* : Yes


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `setApplication`



##### Parameter `application`


* *type* : Gplanchat\Io\Net\Tcp\Plugin\Server
* *is nullable* : No


#### Method `getApplication`



#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\Io\Net\Tcp\Plugin\Server
* *is nullable* : No






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)