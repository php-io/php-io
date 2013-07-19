Namespace `Gplanchat\Io\Filesystem`
==========



## Classes

### Interface `FileInterface`

_Declared in namespace `Gplanchat\Io\Filesystem`_ [» Read the docs](Gplanchat-Io-Filesystem.md#interface-fileinterface)

Interface FileInterface

#### Implemented Interfaces

* `Gplanchat\Io\Loop\LoopAwareInterface`


#### Method `__construct`



##### Parameter `filesystem`


* *type* : Gplanchat\Io\Filesystem\FilesystemInterface
* *is nullable* : No


##### Parameter `streamId`


* *type* : 
* *is nullable* : Yes


#### Method `setFilesystem`



##### Parameter `filesystem`


* *type* : Gplanchat\Io\Filesystem\FilesystemInterface
* *is nullable* : No


#### Method `getFilesystem`



#### Method `setStreamId`



##### Parameter `streamId`


* *type* : 
* *is nullable* : Yes


#### Method `getStreamId`



#### Method `truncate`



##### Parameter `length`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `write`



##### Parameter `data`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `writeBuffer`



##### Parameter `data`


* *type* : 
* *is nullable* : Yes


##### Parameter `offset`


* *type* : 
* *is nullable* : Yes


##### Parameter `length`


* *type* : 
* *is nullable* : Yes


##### Parameter `position`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`




### Interface `FilesystemInterface`

_Declared in namespace `Gplanchat\Io\Filesystem`_ [» Read the docs](Gplanchat-Io-Filesystem.md#interface-filesysteminterface)



#### Implemented Interfaces

* `Gplanchat\Io\Loop\LoopAwareInterface`


#### Method `__construct`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No


#### Method `open`



##### Parameter `path`


* *type* : 
* *is nullable* : Yes


##### Parameter `flags`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `openMode`



##### Parameter `path`


* *type* : 
* *is nullable* : Yes


##### Parameter `flags`


* *type* : 
* *is nullable* : Yes


##### Parameter `chmod`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `rename`



##### Parameter `from`


* *type* : 
* *is nullable* : Yes


##### Parameter `to`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `chown`



##### Parameter `path`


* *type* : 
* *is nullable* : Yes


##### Parameter `uid`


* *type* : 
* *is nullable* : Yes


##### Parameter `gid`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `chmod`



##### Parameter `path`


* *type* : 
* *is nullable* : Yes


##### Parameter `mode`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `fchown`



##### Parameter `fd`


* *type* : 
* *is nullable* : Yes


##### Parameter `uid`


* *type* : 
* *is nullable* : Yes


##### Parameter `gid`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `fchmod`



##### Parameter `fd`


* *type* : 
* *is nullable* : Yes


##### Parameter `mode`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `ftruncate`



##### Parameter `fd`


* *type* : 
* *is nullable* : Yes


##### Parameter `length`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `stat`

@todo

##### Parameter `path`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `fstat`

@todo

##### Parameter `fd`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`




### Trait `FileTrait`

_Declared in namespace `Gplanchat\Io\Filesystem`_ [» Read the docs](Gplanchat-Io-Filesystem.md#trait-filetrait)

Class File

#### Used Traits

* `Gplanchat\Io\Loop\LoopAwareTrait`


#### Method `setFilesystem`



##### Parameter `filesystem`


* *type* : Gplanchat\Io\Filesystem\FilesystemInterface
* *is nullable* : No


#### Method `getFilesystem`



#### Method `setStreamId`



##### Parameter `streamId`


* *type* : 
* *is nullable* : Yes


#### Method `getStreamId`



#### Method `getLoop`



#### Method `setLoop`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)