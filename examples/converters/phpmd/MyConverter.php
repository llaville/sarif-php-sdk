<?php

use Bartlett\Sarif\Converter\PhpMdConverter;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\ToolComponent;
use Composer\InstalledVersions;

class MyConverter extends PhpMdConverter
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
        $extension->setShortDescription(new MultiformatMessageString('PHPMD SARIF Converter'));
        $extension->setVersion($converterVersion);

        return [$extension];
    }
}
