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

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/sarifLog.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\SarifLog;

$log = new SarifLog();

```
