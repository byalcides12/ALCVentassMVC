<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita4f8176d87964a41cd22249b77b0f1ed
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Libs\\' => 5,
            'League\\Plates\\' => 14,
        ),
        'A' => 
        array (
            'App\\Controllers\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Libs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/libs',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita4f8176d87964a41cd22249b77b0f1ed::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita4f8176d87964a41cd22249b77b0f1ed::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita4f8176d87964a41cd22249b77b0f1ed::$classMap;

        }, null, ClassLoader::class);
    }
}