<!-- markdownlint-disable MD013 -->
# result object

A `result` object describes a single result detected by an analysis tool.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317638).

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
                            "shortDescription": {
                                "text": "Specify marshaling for P\/Invoke string arguments."
                            }
                        },
                        {
                            "id": "CA5350",
                            "shortDescription": {
                                "text": "Do not use weak cryptographic algorithms."
                            }
                        }
                    ]
                }
            },
            "results": [
                {
                    "message": {
                        "text": "Result on rule 0"
                    },
                    "ruleId": "CA2101",
                    "ruleIndex": 0
                },
                {
                    "message": {
                        "text": "Result on rule 1"
                    },
                    "ruleId": "CA5350\/md5",
                    "ruleIndex": 1
                },
                {
                    "message": {
                        "text": "Another result on rule 1"
                    },
                    "ruleId": "CA5350\/sha-1",
                    "ruleIndex": 1
                }
            ]
        }
    ]
}
```

## How to generate

See `examples/result.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule1 = new ReportingDescriptor('CA2101');
$rule1->setShortDescription(
    new MultiformatMessageString('Specify marshaling for P/Invoke string arguments.')
);
$rule2 = new ReportingDescriptor('CA5350');
$rule2->setShortDescription(
    new MultiformatMessageString('Do not use weak cryptographic algorithms.')
);
$driver->addRules([$rule1, $rule2]);

$tool = new Tool($driver);

$result1 = new Result(new Message('Result on rule 0'));
$result1->setRuleId('CA2101');
$result1->setRuleIndex(0);

$result2 = new Result(new Message('Result on rule 1'));
$result2->setRuleId('CA5350/md5');
$result2->setRuleIndex(1);

$result3 = new Result(new Message('Another result on rule 1'));
$result3->setRuleId('CA5350/sha-1');
$result3->setRuleIndex(1);

$run = new Run($tool);
$run->addResults([$result1, $result2, $result3]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
