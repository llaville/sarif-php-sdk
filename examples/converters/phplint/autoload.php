<?php

spl_autoload_register(function (string $class): void {
    static $composerAutoloader;

    if ($composerAutoloader === null) {
        $composerAutoloader = require dirname(__DIR__, 3) . '/vendor/autoload.php';
    }

    $composerAutoloader->addClassMap([
        'MySerializerFactory' => __DIR__ . '/MySerializer.php',
        'MyConverter' => __DIR__ . '/MyConverter.php',
    ]);

    $composerAutoloader->loadClass($class);
});
