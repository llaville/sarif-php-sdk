<?php

//require __DIR__ . '/vendor/autoload.php';

$finder = (new PhpCsFixer\Finder())
    ->files()
    ->in(dirname(__DIR__, 3) . '/src/')
    ->depth(0)
;

return (new PhpCsFixer\Config())
    ->registerCustomReporters([
        new \Bartlett\Sarif\Converter\PhpCsFixerConverter(),
    ])
    ->setRules([
        '@PER-CS' => true,
    ])
    ->setFinder($finder)
;
