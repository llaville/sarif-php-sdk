<!-- markdownlint-disable MD013 -->
# reportingDescriptorRelationship object

A `reportingDescriptorRelationship` object specifies one or more directed relationships
from one `reportingDescriptor` object, which we refer to as theSource, to another one, which we refer to as theTarget.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317870).

## Example

```json
{
    "$schema": "https:\/\/json.schemastore.org\/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "CodeScanner",
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https:\/\/codeScanner.dev",
                    "rules": [
                        {
                            "id": "CA1000",
                            "relationships": [
                                {
                                    "target": {
                                        "index": 0,
                                        "id": "327",
                                        "guid": "33333333-0000-1111-8888-111111111111",
                                        "toolComponent": {
                                            "name": "CWE",
                                            "guid": "33333333-0000-1111-8888-000000000000"
                                        }
                                    },
                                    "kinds": [
                                        "superset"
                                    ]
                                }
                            ]
                        }
                    ]
                }
            },
            "results": []
        }
    ]
}
```

## How to generate

See `examples/reportingDescriptorRelationship.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\ReportingDescriptorReference;
use Bartlett\Sarif\Definition\ReportingDescriptorRelationship;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Definition\ToolComponentReference;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule = new ReportingDescriptor('CA1000');

$target = new ReportingDescriptorReference(0, '327', '33333333-0000-1111-8888-111111111111');
$toolComponent = new ToolComponentReference();
$toolComponent->setName('CWE');
$toolComponent->setGuid('33333333-0000-1111-8888-000000000000');
$target->setToolComponent($toolComponent);

$relationship = new ReportingDescriptorRelationship($target);
$relationship->addKinds(['superset']);
$rule->addRelationships([$relationship]);
$driver->addRules([$rule]);

$tool = new Tool($driver);

$run = new Run($tool);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
