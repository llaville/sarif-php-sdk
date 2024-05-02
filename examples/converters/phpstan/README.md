<!-- markdownlint-disable MD013 -->
# PHPStan Converter

> [!NOTE]
> Available since version 1.2.0 that requires PHP 7.4.0 or greater.

## Requirements

* [PHPStan][phpstan] requires PHP version 7.2.0 or greater
* This SARIF converter requires at least PHPStan version 1.9.0

## Installation

```shell
composer require --dev phpstan/phpstan bartlett/sarif-php-sdk
```

Then update your `phpstan.neon` configuration file:

```yaml
services:
    errorFormatter.sarif:
        class: Bartlett\Sarif\Converter\PhpStanConverter
```

## Usage

From `examples/converters/phpstan` demo folder :

```shell
../../../vendor/bin/phpstan analyse --error-format=sarif
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
            $realEncoder = new PhpJsonEncoder(JSON_PRETTY_PRINT);
        }
        return parent::createEncoder($realEncoder);
    }
}
```

**Step 2:** Create your converter specialized class :

```php
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
```

**Step 3:** Then update your `phpstan.neon` configuration file:

```yaml
services:
    errorFormatter.sarif:
        class: MyConverter
        arguments:
            prettyPrint: true
```

**Step 4:** And finally, print the SARIF report

```shell
../../../vendor/bin/phpstan analyse --error-format=sarif --autoload-file bootstrap.php
```

### Change contents of tool object in SARIF output

A `tool` object describes the analysis tool or converter that was run.

> see API [tool][api-tool] reference

Here we will see how to identify this converter in SARIF report :

**Step 1:** Create your converter specialized class :

```php
<?php

use Bartlett\Sarif\Converter\PhpStanConverter;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\ToolComponent;
use Composer\InstalledVersions;

class MyConverter extends PhpStanConverter
{
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
```

**Step 2:** And finally, print the SARIF report

```shell
../../../vendor/bin/phpstan analyse --error-format=sarif --autoload-file bootstrap.php
```

[phpstan]: https://github.com/phpstan/phpstan
[json-encode]: https://www.php.net/manual/en/function.json-encode
[api-tool]: https://github.com/llaville/sarif-php-sdk/blob/master/docs/reference/tool.md
