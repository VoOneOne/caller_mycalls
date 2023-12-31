<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitdf892f1e335c2dce938f78a1858f3838
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

        spl_autoload_register(array('ComposerAutoloaderInitdf892f1e335c2dce938f78a1858f3838', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitdf892f1e335c2dce938f78a1858f3838', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitdf892f1e335c2dce938f78a1858f3838::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
