<!-- markdownlint-disable MD013 -->
# configurationOverride object

A `configurationOverride` object modifies the effective runtime configuration of a specified `reportingDescriptor` object,
which we refer to as theDescriptor.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317858).

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

See `examples/configurationOverride.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ConfigurationOverride;
use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\ReportingConfiguration;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\ReportingDescriptorReference;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule = new ReportingDescriptor('CA2101');
$reportingConf = new ReportingConfiguration();
$reportingConf->setLevel('error');
$rule->setDefaultConfiguration($reportingConf);
$driver->addRules([$rule]);

$tool = new Tool($driver);

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

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
