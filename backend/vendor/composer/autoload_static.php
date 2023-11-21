<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit07f465c877ce5212b4329c75256ca801
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hpdav\\Backend\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hpdav\\Backend\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit07f465c877ce5212b4329c75256ca801::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit07f465c877ce5212b4329c75256ca801::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit07f465c877ce5212b4329c75256ca801::$classMap;

        }, null, ClassLoader::class);
    }
}
