<?php

use Bartlett\Sarif\Factory\PhpSerializerFactory;
use Bartlett\Sarif\Serializer\Encoder\EncoderInterface;
use Bartlett\Sarif\Serializer\Encoder\PhpJsonEncoder;

class MySerializerFactory extends PhpSerializerFactory
{
    private bool $prettyPrint;

    public function __construct(bool $prettyPrint)
    {
        $this->prettyPrint = $prettyPrint;
    }

    public function createEncoder($realEncoder = null): EncoderInterface
    {
        if ($this->prettyPrint) {
            $realEncoder = new PhpJsonEncoder(JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
        return parent::createEncoder($realEncoder);
    }
}
