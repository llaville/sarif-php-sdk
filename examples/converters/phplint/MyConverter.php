<?php

use Bartlett\Sarif\Converter\PhpLintConverter;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\ToolComponent;
use Composer\InstalledVersions;

class MyConverter extends PhpLintConverter
{
    public function __construct()
    {
        $factory = new MySerializerFactory();
        parent::__construct($factory);
    }

    public function toolExtensions(): array
    {
        $converterPackage = 'bartlett/sarif-php-sdk';
        $converterVersion = InstalledVersions::getVersion($converterPackage);

        $extension = new ToolComponent($converterPackage);
        $extension->setShortDescription(new MultiformatMessageString('PHPLint SARIF Converter'));
        $extension->setVersion($converterVersion);

        return [$extension];
    }
}
