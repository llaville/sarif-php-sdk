<?php

namespace MyNamespace;

use Bartlett\Sarif\Converter\PhpCsFixerConverter;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\ToolComponent;
use Composer\InstalledVersions;

class MyConverter extends PhpCsFixerConverter
{
    public function __construct()
    {
        $factory = new MySerializerFactory(true);
        parent::__construct($factory);
    }

    public function toolExtensions(): array
    {
        $converterPackage = 'bartlett/sarif-php-sdk';
        $converterVersion = InstalledVersions::getVersion($converterPackage);

        $extension = new ToolComponent($converterPackage);
        $extension->setShortDescription(new MultiformatMessageString('PHP-CS-Fixer SARIF Converter'));
        $extension->setVersion($converterVersion);

        return [$extension];
    }
}
