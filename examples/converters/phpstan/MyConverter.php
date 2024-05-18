<?php

use Bartlett\Sarif\Converter\PhpStanConverter;

class MyConverter extends PhpStanConverter
{
    public function __construct(bool $prettyPrint)
    {
        $factory = new MySerializerFactory($prettyPrint);
        parent::__construct($factory);
    }
}
