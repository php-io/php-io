Namespace `Gplanchat\Io\Application\Plugin`
==========



## Classes

### Class `Logger`

_Declared in namespace `Gplanchat\Io\Application\Plugin`_ [» Read the docs](Gplanchat-Io-Application-Plugin.md#class-logger)



#### Implemented Interfaces

* `Gplanchat\PluginManager\PluginInterface`


#### Method `__construct`



#### Method `__invoke`



##### Parameter `namespace`


* *type* : 
* *is nullable* : Yes


##### Parameter `params`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `register`



##### Parameter `application`


* *type* : Gplanchat\PluginManager\PluginManagerInterface
* *is nullable* : No




### Interface `PluginInterface`

_Declared in namespace `Gplanchat\Io\Application\Plugin`_ [» Read the docs](Gplanchat-Io-Application-Plugin.md#interface-plugininterface)



#### Implemented Interfaces

* `Gplanchat\PluginManager\PluginInterface`


#### Method `setApplication`



##### Parameter `application`


* *type* : Gplanchat\Io\Application\Application
* *is nullable* : No


#### Method `getApplication`





### Trait `PluginTrait`

_Declared in namespace `Gplanchat\Io\Application\Plugin`_ [» Read the docs](Gplanchat-Io-Application-Plugin.md#trait-plugintrait)



#### Method `setApplication`



##### Parameter `application`


* *type* : Gplanchat\Io\Application\Application
* *is nullable* : No


#### Method `getApplication`







[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)