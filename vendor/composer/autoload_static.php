<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit41b0e992fb3fd006ce70ddafce7514fb
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit41b0e992fb3fd006ce70ddafce7514fb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit41b0e992fb3fd006ce70ddafce7514fb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
