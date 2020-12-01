<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit42c1df23c4740bf2e86a493c3c372fa8
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'NiclasKahlmeier\\RocketChat\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'NiclasKahlmeier\\RocketChat\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit42c1df23c4740bf2e86a493c3c372fa8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit42c1df23c4740bf2e86a493c3c372fa8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit42c1df23c4740bf2e86a493c3c372fa8::$classMap;

        }, null, ClassLoader::class);
    }
}
