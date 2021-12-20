<!-- markdownlint-disable MD013 -->
# run object

An sarifLog object specifies the version of the file format and contains the output from one or more runs.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317484).

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
            "properties": {
                "stableId": "Nightly static analysis run"
            },
            "results": []
        }
    ]
}
```

## How to generate

See `examples/run.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('Psalm');
$driver->setInformationUri('https://psalm.de');
$driver->setVersion('4.x-dev');
$tool = new Tool($driver);

$propertyBag = new PropertyBag();
$propertyBag->addProperty('stableId', 'Nightly static analysis run');

$run = new Run($tool);
$run->setProperties($propertyBag);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
