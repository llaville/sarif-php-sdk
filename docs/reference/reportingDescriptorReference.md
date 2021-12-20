<!-- markdownlint-disable MD013 -->
# reportingDescriptorReference object

A `reportingDescriptorReference` object identifies a particular `reportingDescriptor` object,
which we refer to as theDescriptor, among all `reportingDescriptor` objects defined by theTool,
including those defined by theTool.driver and theTool.extensions.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317862).

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
                            "id": "CTN9999",
                            "shortDescription": {
                                "text": "First version of rule."
                            }
                        },
                        {
                            "id": "CTN9999",
                            "shortDescription": {
                                "text": "Second version of rule."
                            }
                        }
                    ]
                }
            },
            "invocations": [
                {
                    "executionSuccessful": true,
                    "toolExecutionNotifications": [
                        {
                            "message": {
                                "text": "Exception evaluating rule 'C2001'. Rule configuration is missing."
                            },
                            "level": "error",
                            "descriptor": {
                                "index": 1,
                                "id": "CTN9999"
                            }
                        }
                    ]
                }
            ],
            "results": [
                {
                    "message": {
                        "text": "..."
                    },
                    "ruleId": "CTN9999"
                }
            ]
        }
    ]
}
```

## How to generate

See `examples/reportingDescriptorReference.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\Notification;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\ReportingDescriptorReference;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$ruleV1 = new ReportingDescriptor('CTN9999');
$ruleV1->setShortDescription(new MultiformatMessageString('First version of rule.'));
$ruleV2 = new ReportingDescriptor('CTN9999');
$ruleV2->setShortDescription(new MultiformatMessageString('Second version of rule.'));

$driver->addRules([$ruleV1, $ruleV2]);

$tool = new Tool($driver);

$notification = new Notification(new Message("Exception evaluating rule 'C2001'. Rule configuration is missing."));
$notification->setAssociatedRule(new ReportingDescriptorReference(0, 'C2001'));
$notification->setDescriptor(new ReportingDescriptorReference(1, 'CTN9999'));
$notification->setLevel('error');
$invocation = new Invocation(true);
$invocation->addToolExecutionNotifications([$notification]);

$result = new Result(new Message('...'));
$result->setRuleId('CTN9999');

$run = new Run($tool);
$run->addResults([$result]);
$run->addInvocations([$invocation]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
