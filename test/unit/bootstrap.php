<?php

include __DIR__ . '/../../vendor/autoload.php';


spl_autoload_register(function($className){
    $className = ltrim($className, '\\');
    $fileName  = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    include $fileName;
});

set_include_path(
    implode(PATH_SEPARATOR, array_merge(
        explode(PATH_SEPARATOR, get_include_path()), [__DIR__]
    ))
);
