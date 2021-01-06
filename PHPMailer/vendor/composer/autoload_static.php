<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf1893db4907796da0ff277b924702020
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf1893db4907796da0ff277b924702020::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf1893db4907796da0ff277b924702020::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}