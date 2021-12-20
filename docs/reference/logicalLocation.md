<!-- markdownlint-disable MD013 -->
# logicalLocation object

A `logicalLocation` object describes a logical location.
A logical location is a location specified by a programmatic construct such as a namespace, a type, or a method,
without regard to the physical location where the construct occurs.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317719).

## Example

```json
{
    "$schema": "https:\/\/json.schemastore.org\/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "Psalm",
                    "version": "4.x-dev",
                    "informationUri": "https:\/\/psalm.de"
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

See `examples/logicalLocation.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\LogicalLocation;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('Psalm');
$driver->setInformationUri('https://psalm.de');
$driver->setVersion('4.x-dev');
$tool = new Tool($driver);

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

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
