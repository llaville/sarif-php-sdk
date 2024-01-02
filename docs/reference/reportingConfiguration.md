<!-- markdownlint-disable MD013 -->
# reportingConfiguration object

A `reportingConfiguration` object contains the information in a `reportingDescriptor` that a SARIF producer can modify
at runtime, before executing its scan.

![reportingConfiguration object](../assets/images/reference-reporting-configuration.graphviz.svg)

## Example

```json
{
    "$schema": "https://json.schemastore.org/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "CodeScanner",
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https://codeScanner.dev",
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

See full [`examples/reportingConfiguration.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/reportingConfiguration.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\ReportingConfiguration;
use Bartlett\Sarif\Definition\ReportingDescriptor;

$rule = new ReportingDescriptor('SA2707');
$rule->setName('LimitSourceLineLength');
$rule->setShortDescription(new MultiformatMessageString('Limit source line length for readability.'));
$reportingConf = new ReportingConfiguration();
$propertyBag = new PropertyBag();
$propertyBag->addProperty('maxLength', 120);
$reportingConf->setParameters($propertyBag);
$rule->setDefaultConfiguration($reportingConf);

```
