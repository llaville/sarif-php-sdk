<!-- markdownlint-disable MD013 -->
# logicalLocation object

A `logicalLocation` object describes a logical location.
A logical location is a location specified by a programmatic construct such as a namespace, a type, or a method,
without regard to the physical location where the construct occurs.

![logicalLocation object](../assets/images/reference-logical-location.graphviz.svg)

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
            "logicalLocations": [
                {
                    "name": "Hook",
                    "fullyQualifiedName": "Psalm\\Plugin\\Hook",
                    "kind": "namespace"
                },
                {
                    "name": "afterAnalysis",
                    "fullyQualifiedName": "Psalm\\Plugin\\Hook\\AfterAnalysisInterface\\afterAnalysis",
                    "kind": "function"
                }
            ],
            "results": []
        }
    ]
}
```

## How to generate

See full [`examples/logicalLocation.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/logicalLocation.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\LogicalLocation;
use Bartlett\Sarif\Definition\Run;

$nsLocation = new LogicalLocation();
$nsLocation->setName('Hook');
$nsLocation->setFullyQualifiedName('Psalm\Plugin\Hook');
$nsLocation->setKind('namespace');

$funcLocation = new LogicalLocation();
$funcLocation->setName('afterAnalysis');
$funcLocation->setFullyQualifiedName('Psalm\Plugin\Hook\AfterAnalysisInterface\afterAnalysis');
$funcLocation->setKind('function');

$run = new Run($tool);
$run->addLogicalLocations([$nsLocation, $funcLocation]);

```
