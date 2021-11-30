<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e455d330c6387ccec3dc3aeaa84c8b1
{
    public static $files = array (
        '4036e57381a0c6a845a89d2b31f45026' => __DIR__ . '/../..' . '/framework/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Framework\\' => 10,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Framework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/framework',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3e455d330c6387ccec3dc3aeaa84c8b1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3e455d330c6387ccec3dc3aeaa84c8b1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3e455d330c6387ccec3dc3aeaa84c8b1::$classMap;

        }, null, ClassLoader::class);
    }
}
