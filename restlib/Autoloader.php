<?php
namespace BAServer;

class Autoloader
{
    public static function autoload($className) {
        if ('BAServer\\' === substr($className, 0, strlen('BAServer\\'))) {
            $classPath = explode('\\', $className);
            array_shift($classPath);

            $classFile = __DIR__ . '/' . implode('/', $classPath) . '.php';

            if (file_exists($classFile)) {
                require_once $classFile;
            }
        }
    }
}

ini_set('unserialize_callback_func', 'spl_autoload_call');
spl_autoload_register(array(new Autoloader, 'autoload'));
