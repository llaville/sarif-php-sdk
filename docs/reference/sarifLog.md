<!-- markdownlint-disable MD013 -->
# sarifLog object

A `sarifLog` object specifies the version of the file format and contains the output from one or more runs.

![sarifLog object](../assets/images/reference-sarif-log.graphviz.svg)

## Example

```json
{
    "$schema": "https://json.schemastore.org/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": []
}
```

## How to generate

See full [`examples/sarifLog.php`][example-script] script into repository.

> [!NOTE]
> Since release 1.5.0, you may use fluent builders API as alternative.
> See full [`examples/builder/sarifLog.php`][example-builder] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/sarifLog.php
[example-builder]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/builder/sarifLog.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\SarifLog;

$log = new SarifLog();

```
