<?php
$vendorDir = __DIR__ . '/../vendor';

// Composer autoloading
if (file_exists($vendorDir . '/autoload.php')) {
    $loader = include $vendorDir . '/autoload.php';
}

// Support for ZF2_PATH environment variable or git submodule
if (($zf2Path = getenv('ZF2_PATH') ?: (is_dir($vendorDir . '/ZF2/library') ? $vendorDir . '/ZF2/library' : false)) !== false) {
    if (isset($loader)) {
        $loader->add('Zend', $zf2Path . '/Zend');
    } else {
        include $zf2Path . '/Zend/Loader/AutoloaderFactory.php';
        Zend\Loader\AutoloaderFactory::factory(array(
            'Zend\Loader\StandardAutoloader' => array(
                'autoregister_zf' => true
            )
        ));
    }
}

if (!class_exists('Zend\Loader\AutoloaderFactory')) {
    throw new RuntimeException('Unable to load ZF2. Run `php composer.phar install` or define a ZF2_PATH environment variable.');
}