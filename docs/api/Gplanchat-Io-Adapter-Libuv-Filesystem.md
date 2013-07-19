Namespace `Gplanchat\Io\Adapter\Libuv\Filesystem`
==========



## Classes

### Class `File`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Filesystem`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Filesystem.md#class-file)

Class File

#### Implemented Interfaces

* `Gplanchat\Io\Filesystem\FileInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`


#### Used Traits

* `Gplanchat\Io\Filesystem\FileTrait`


#### Method `__construct`



##### Parameter `filesystem`


* *type* : Gplanchat\Io\Filesystem\FilesystemInterface
* *is nullable* : No


##### Parameter `streamId`


* *type* : 
* *is nullable* : Yes


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




### Class `Filesystem`

_Declared in namespace `Gplanchat\Io\Adapter\Libuv\Filesystem`_ [» Read the docs](Gplanchat-Io-Adapter-Libuv-Filesystem.md#class-filesystem)



#### Implemented Interfaces

* `Gplanchat\Io\Filesystem\FilesystemInterface`
* `Gplanchat\Io\Loop\LoopAwareInterface`


#### Used Traits

* `Gplanchat\Io\Loop\LoopAwareTrait`


#### Method `__construct`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No


#### Method `open`

Opens a file for reading/writing. The callback will get $this instance and a new instance of class Gplanchat\Io\Filesystem\FileInterface on which file-related operations will be possible. If the file was created, it will be assigned the mode 0644.

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

Opens a file for reading/writing, assigning a mode to the file if was newly created. The callback will get $this instance and a new instance of class Gplanchat\Io\Filesystem\FileInterface on which file-related operations will be possible.

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

Rename or move a file. The callback will get $this instance and an boolean determining if the operation was successful or not.

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

@todo

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

@todo

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

@todo

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

@todo

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


#### Method `truncate`

@todo

##### Parameter `path`


* *type* : 
* *is nullable* : Yes


##### Parameter `length`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `ftruncate`

@todo

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


#### Method `link`

@todo

##### Parameter `sourcePath`


* *type* : 
* *is nullable* : Yes


##### Parameter `sestinationPath`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


#### Method `symlink`

@todo

##### Parameter `sourcePath`


* *type* : 
* *is nullable* : Yes


##### Parameter `sestinationPath`


* *type* : 
* *is nullable* : Yes


##### Parameter `callback`


* *type* : callable
* *is nullable* : No


##### Parameter `flags`


* *type* : 
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `getLoop`



#### Method `setLoop`



##### Parameter `loop`


* *type* : Gplanchat\Io\Loop\LoopInterface
* *is nullable* : No






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)