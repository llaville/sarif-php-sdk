<!-- markdownlint-disable MD013 -->
# configurationOverride object

A `configurationOverride` object modifies the effective runtime configuration of a specified `reportingDescriptor` object,
which we refer to as theDescriptor.

![configurationOverride object](../assets/images/reference-configuration-override.graphviz.svg)

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
                            "id": "CA2101",
                            "defaultConfiguration": {
                                "enabled": true,
                                "level": "error",
                                "rank": -1
                            }
                        }
                    ]
                }
            },
            "invocations": [
                {
                    "executionSuccessful": true,
                    "ruleConfigurationOverrides": [
                        {
                            "configuration": {
                                "enabled": true,
                                "level": "warning",
                                "rank": -1
                            },
                            "descriptor": {
                                "index": 0
                            }
                        }
                    ]
                }
            ],
            "results": []
        }
    ]
}
```

## How to generate

See full [`examples/configurationOverride.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/configurationOverride.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ConfigurationOverride;
use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\ReportingConfiguration;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\ReportingDescriptorReference;
use Bartlett\Sarif\Definition\Run;

$rule = new ReportingDescriptor('CA2101');
$reportingConf = new ReportingConfiguration();
$reportingConf->setLevel('error');
$rule->setDefaultConfiguration($reportingConf);
$driver->addRules([$rule]);

$ruleConf = new ReportingConfiguration();
$ruleConf->setLevel('warning');

$confOverrides = new ConfigurationOverride();
$descriptor = new ReportingDescriptorReference(0);
$confOverrides->setDescriptor($descriptor);
$confOverrides->setConfiguration($ruleConf);

$invocation = new Invocation(true);
$invocation->addRuleConfigurationOverrides([$confOverrides]);

$run = new Run($tool);
$run->addInvocations([$invocation]);

```
