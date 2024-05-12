<!-- markdownlint-disable MD013 -->
# PHP-CS-Fixer Converter

> [!NOTE]
> Available since version 1.3.0 that requires PHP 7.4.0 or greater.

## Requirements

* [PHP-CS-Fixer][php-cs-fixer] requires PHP version 7.4.0 or greater
* This SARIF converter requires at least PHP-CS-Fixer version 3.56.1 or greater with patches

## Installation

Use The Fork Luke :)

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/llaville/PHP-CS-Fixer"
        }
    ],
    "require-dev": {
        "friendsofphp/php-cs-fixer": "dev-develop as 3.56.1",
        "bartlett/sarif-php-sdk": "1.3.x-dev"
    }
}
```

```shell
composer update
```

You should see at least

```text
- Installing bartlett/sarif-php-sdk (1.3.x-dev b49da7b): Extracting archive
- Installing friendsofphp/php-cs-fixer (dev-develop 168258b): Extracting archive
```

Because `bartlett/sarif-php-sdk` v1.3.0 (stable) is not yet released, and PHP-CS-Fixer need new features

1. https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/discussions/7995 : see https://github.com/llaville/PHP-CS-Fixer/tree/features/add_custom_reporters
2. https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/discussions/7996 : see https://github.com/llaville/PHP-CS-Fixer/tree/features/add_links_to_doc

My fork, `develop` branch, merged these both features.

## Usage

From `examples/converters/phpcs-fixer` demo folder :

```shell
vendor/bin/php-cs-fixer check --config .php-cs-fixer.sarif.php -v
```

Will display results in `txt` format with clickable rule names pointing to official documentation.


```shell
vendor/bin/php-cs-fixer check --config .php-cs-fixer.sarif.php --format sarif
```

Will display SARIF output in non human-readable format (compacted)

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

namespace MyNamespace;

use Bartlett\Sarif\Converter\PhpCsFixerConverter;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\ToolComponent;
use Composer\InstalledVersions;

class MyConverter extends PhpCsFixerConverter
{
    public function __construct()
    {
        $factory = new MySerializerFactory(true);
        parent::__construct($factory);
    }

    public function toolExtensions(): array
    {
        $converterPackage = 'bartlett/sarif-php-sdk';
        $converterVersion = InstalledVersions::getVersion($converterPackage);

        $extension = new ToolComponent($converterPackage);
        $extension->setShortDescription(new MultiformatMessageString('PHP-CS-Fixer SARIF Converter'));
        $extension->setVersion($converterVersion);

        return [$extension];
    }
}
```

**Step 3:** And finally, print the SARIF report

```shell
vendor/bin/php-cs-fixer check --config .php-cs-fixer.sarif-custom.php --format sarif
```

[php-cs-fixer]: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer
