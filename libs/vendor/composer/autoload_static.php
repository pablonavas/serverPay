<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita04baf954a81450b3ff8269ba8dffb31
{
    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInita04baf954a81450b3ff8269ba8dffb31::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}