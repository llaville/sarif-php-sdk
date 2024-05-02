<?php

use Bartlett\Sarif\Factory\PhpSerializerFactory;
use Bartlett\Sarif\Serializer\Encoder\EncoderInterface;
use Bartlett\Sarif\Serializer\Encoder\PhpJsonEncoder;

class MySerializerFactory extends PhpSerializerFactory
{
    public function createEncoder($realEncoder = null): EncoderInterface
    {
        $realEncoder = new PhpJsonEncoder(JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return parent::createEncoder($realEncoder);
    }
}
