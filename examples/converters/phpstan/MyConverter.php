<?php

use Bartlett\Sarif\Converter\PhpStanConverter;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\ToolComponent;
use Composer\InstalledVersions;

class MyConverter extends PhpStanConverter
{
    public function __construct(bool $prettyPrint)
    {
        $factory = new MySerializerFactory($prettyPrint);
        parent::__construct($factory);
    }

    public function toolExtensions(): array
    {
        $converterPackage = 'bartlett/sarif-php-sdk';
        $converterVersion = InstalledVersions::getVersion($converterPackage);

        $extension = new ToolComponent($converterPackage);
        $extension->setShortDescription(new MultiformatMessageString('PHPStan SARIF Converter'));
        $extension->setVersion($converterVersion);

        return [$extension];
    }
}
