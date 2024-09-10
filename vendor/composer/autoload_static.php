<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcf243349d5ac692ecb7a8ac84a67b33a
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInitcf243349d5ac692ecb7a8ac84a67b33a::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInitcf243349d5ac692ecb7a8ac84a67b33a::$classMap;

        }, null, ClassLoader::class);
    }
}
