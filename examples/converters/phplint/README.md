<!-- markdownlint-disable MD013 -->
# PHPLint Converter

> [!NOTE]
> Available since version 1.2.0 that requires PHP 7.4.0 or greater.

## Requirements

* [PHPLint][phplint] requires PHP version 8.1.0 or greater
* This SARIF converter requires at least PHPLint version 9.2.0

## Installation

```shell
composer require --dev overtrue/phplint bartlett/sarif-php-sdk
```

## Usage

From `examples/converters/phplint` demo folder :

```shell
../../../vendor/bin/phplint --log-sarif
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
// MySerializer.php

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
```

**Step 2:** Create your converter specialized class :

```php
<?php
// MyConverter.php

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
```

**Step 3:** Create your own class loader to register custom serializer and converter

```php
<?php
// autoload.php

spl_autoload_register(function (string $class): void {
    static $composerAutoloader;

    if ($composerAutoloader === null) {
        $composerAutoloader = require dirname(__DIR__, 3) . '/vendor/autoload.php';
    }

    $composerAutoloader->addClassMap([
        'MySerializerFactory' => __DIR__ . '/MySerializer.php',
        'MyConverter' => __DIR__ . '/MyConverter.php',
    ]);

    $composerAutoloader->loadClass($class);
});
```

**Step 4:** Use a custom binary launcher

> [!WARNING]
> Creation of a custom launcher is no more necessary with PHPLint 9.3.1 or greater. Use the `--bootstrap` option.

```php
#!/usr/bin/env php
<?php

gc_disable(); // performance boost

require_once __DIR__ . '/autoload.php';
require_once dirname(__DIR__, 3) . '/vendor/overtrue/phplint/phplint.php';
```

**Step 5:** And finally, print the SARIF report

With custom launcher :

```shell
./phplint -v
```

Without custom launcher :

```shell
../../../vendor/bin/phplint --bootstrap autoload.php
```

[phplint]: https://github.com/overtrue/phplint
[json-encode]: https://www.php.net/manual/en/function.json-encode
