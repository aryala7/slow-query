<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit87e89fea33608ed19ba09f356a48298c
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'aryala\\slowquery\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'aryala\\slowquery\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit87e89fea33608ed19ba09f356a48298c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit87e89fea33608ed19ba09f356a48298c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit87e89fea33608ed19ba09f356a48298c::$classMap;

        }, null, ClassLoader::class);
    }
}
