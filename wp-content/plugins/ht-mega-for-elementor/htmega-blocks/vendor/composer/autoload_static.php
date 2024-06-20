<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd5cf758f19504d0659ceb7714927c954
{
    public static $files = array (
        'fb2bdff35099848de46b66aa69495de3' => __DIR__ . '/../..' . '/includes/helper-functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'HtMegaBlocks\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'HtMegaBlocks\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd5cf758f19504d0659ceb7714927c954::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd5cf758f19504d0659ceb7714927c954::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd5cf758f19504d0659ceb7714927c954::$classMap;

        }, null, ClassLoader::class);
    }
}
