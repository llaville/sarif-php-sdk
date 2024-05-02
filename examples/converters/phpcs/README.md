<!-- markdownlint-disable MD013 -->
# PHP_CodeSniffer Converter

> [!NOTE]
> Available since version 1.2.0 that requires PHP 7.4.0 or greater.
>
> Learn more on [Allow requesting a custom report using the report FQN][phpcs-report-fqn] phpcs feature.

## Requirements

* [PHP_CodeSniffer][phpcs] requires PHP version 5.4.0 or greater, with `tokenizer`, `xmlwriter` and `simplexml` extensions loaded
* This SARIF converter requires at least PHP_CodeSniffer version 3.3.0

## Installation

```shell
composer require --dev squizlabs/php_codesniffer bartlett/sarif-php-sdk
```

## Usage

From `examples/converters/phpcs` demo folder :

```shell
../../../vendor/bin/phpcs --report='\Bartlett\Sarif\Converter\PhpCsConverter'
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
namespace MyStandard\CS;

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

namespace MyStandard\CS;

require_once __DIR__ . '/MySerializer.php';

use Bartlett\Sarif\Converter\PhpCsConverter;
use Bartlett\Sarif\Definition\ReportingDescriptor;

use function array_unique;
use function is_string;

class MyConverter extends PhpCsConverter
{
    public function __construct()
    {
        $factory = new MySerializerFactory(true);
        parent::__construct($factory);
    }

    /**
     * Here we want list of PHP CS rules but not the frequency calls (as default behavior)
     *
     * @return ReportingDescriptor[]
     */
    public function rules(): array
    {
        $rules = [];

        foreach (array_unique($this->rules) as $source) {
            if (is_string($source)) {
                $rules[] = new ReportingDescriptor($source);
            }
        }

        return $rules;
    }
}
```

**Step 3:** And finally, print the SARIF report

```shell
../../../vendor/bin/phpcs --report='MyConverter'
```

[phpcs]: https://github.com/PHPCSStandards/PHP_CodeSniffer
[phpcs-report-fqn]: https://github.com/squizlabs/PHP_CodeSniffer/issues/1942
