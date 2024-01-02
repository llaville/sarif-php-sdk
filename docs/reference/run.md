<!-- markdownlint-disable MD013 -->
# run object

A `run` object describes a single run of an analysis tool and contains the output of that run.

![run object](../assets/images/reference-run.graphviz.svg)

## Example

```json
{
    "$schema": "https://json.schemastore.org/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "Psalm",
                    "version": "4.x-dev",
                    "informationUri": "https://psalm.de"
                }
            },
            "properties": {
                "stableId": "Nightly static analysis run"
            },
            "results": []
        }
    ]
}
```

## How to generate

See full [`examples/run.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/run.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;

$driver = new ToolComponent('Psalm');
$tool = new Tool($driver);

$run = new Run($tool);

```
