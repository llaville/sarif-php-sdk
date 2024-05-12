<?php

require __DIR__ . '/MyConverter.php';
require __DIR__ . '/MySerializer.php';

$finder = (new PhpCsFixer\Finder())
    ->files()
    ->in(dirname(__DIR__, 3) . '/src/')
    ->depth(0)
;

return (new PhpCsFixer\Config())
    ->registerCustomReporters([
        new \MyNamespace\MyConverter(),
    ])
    ->setRules([
        '@PER-CS' => true,
    ])
    ->setFinder($finder)
;
