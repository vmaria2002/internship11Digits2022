<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit683d295d5a0cb1798c8f5a5a7d0fc1e1
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit683d295d5a0cb1798c8f5a5a7d0fc1e1', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit683d295d5a0cb1798c8f5a5a7d0fc1e1', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit683d295d5a0cb1798c8f5a5a7d0fc1e1::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
