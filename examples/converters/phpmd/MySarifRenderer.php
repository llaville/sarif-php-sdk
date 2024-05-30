<?php

require_once __DIR__ . '/bootstrap.php';

use Bartlett\Sarif\Converter\PhpMdRenderer;

class MySarifRenderer extends PhpMdRenderer
{
    public function __construct()
    {
        $innerConverter = new MyConverter(true);
        parent::__construct($innerConverter);
    }
}
