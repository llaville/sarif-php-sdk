<!-- markdownlint-disable MD013 -->
# reportingConfiguration object

A `reportingConfiguration` object contains the information in a `reportingDescriptor` that a SARIF producer can modify
at runtime, before executing its scan.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317852).

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
                            "id": "SA2707",
                            "name": "LimitSourceLineLength",
                            "shortDescription": {
                                "text": "Limit source line length for readability."
                            },
                            "defaultConfiguration": {
                                "enabled": true,
                                "level": "warning",
                                "rank": -1,
                                "parameters": {
                                    "maxLength": 120
                                }
                            }
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

See `examples/reportingConfiguration.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\ReportingConfiguration;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule = new ReportingDescriptor('SA2707');
$rule->setName('LimitSourceLineLength');
$rule->setShortDescription(new MultiformatMessageString('Limit source line length for readability.'));
$reportingConf = new ReportingConfiguration();
$propertyBag = new PropertyBag();
$propertyBag->addProperty('maxLength', 120);
$reportingConf->setParameters($propertyBag);
$rule->setDefaultConfiguration($reportingConf);
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
