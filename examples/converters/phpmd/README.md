<!-- markdownlint-disable MD013 -->
# PHP Mess Detector Converter

> [!NOTE]
> Available since version 1.4.0 that requires PHP 7.4.0 or greater.

## Requirements

* [PHP Mess Detector][phpmd] requires PHP version 5.3.9 or greater, with `xml` extensions loaded

## Installation

```shell
composer require --dev phpmd/phpmd bartlett/sarif-php-sdk
```

## Usage

From `examples/converters/phpmd` demo folder :

```shell
../../../vendor/bin/phpmd /path/to/source SarifRenderer ruleset
```

## How to customize your converter

There are many ways to customize render of your converter.

### Make the SARIF report output human-readable

By default, all converters use the default `\Bartlett\Sarif\Factory\PhpSerializerFactory`
to return the SARIF JSON representation of your report.

But this serializer factory component, as native PHP [`json_encode`][json-encode] function,
does not use whitespace in returned data to format it.

To make your report human-readable, you have to specify the `\JSON_PRETTY_PRINT` constant, as encoder option.

Here is one way to do it !

**Step 1:** Create your serializer specialized class :

```php
<?php
// @see examples/converters/phpmd/MySerializer.php

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
```

**Step 2:** Create your converter specialized class :

```php
<?php
// @see examples/converters/phpmd/MyConverter.php

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
```

**Step 3:** Create your resource loader :

```php
<?php
// @see examples/converters/phpmd/bootstrap.php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';
require_once __DIR__ . '/MyConverter.php';
require_once __DIR__ . '/MySerializer.php';
```

**Step 4:** Create your PHPMD renderer specialized class :

```php
<?php
// @see examples/converters/phpmd/MySarifRenderer.php
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
```

**Step 5:** And finally, print the SARIF report

```shell
../../../vendor/bin/phpmd /path/to/source MySarifRenderer ruleset
```

[phpmd]: https://github.com/phpmd/phpmd
