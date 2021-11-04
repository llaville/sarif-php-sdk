# message object

Certain objects in this document define messages intended to be viewed by a user.
SARIF represents such a message with a `message` object, which offers the following features:

- Message strings in plain text (“plain text messages”).
- Message strings that incorporate formatting information (“formatted messages”) in GitHub Flavored Markdown.
- Message strings with placeholders for variable information.
- Message strings with embedded links.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317459).

## PlainText Example

```json
{
    "$schema": "https:\/\/json.schemastore.org\/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "ESLint",
                    "semanticVersion": "8.1.0",
                    "informationUri": "https:\/\/eslint.org",
                    "rules": [
                        {
                            "id": "no-unused-vars",
                            "shortDescription": {
                                "text": "disallow unused variables"
                            },
                            "helpUri": "https:\/\/eslint.org\/docs\/rules\/no-unused-vars",
                            "properties": {
                                "category": "Variables"
                            }
                        }
                    ]
                }
            },
            "results": [
                {
                    "message": {
                        "text": "'x' is assigned a value but never used."
                    },
                    "ruleId": "no-unused-vars",
                    "ruleIndex": 0,
                    "level": "error"
                }
            ]
        }
    ]
}
```

## How to generate

See `examples/message/plainText.php` script.

```php
<?php

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$driver = new ToolComponent('ESLint');
$driver->setInformationUri('https://eslint.org');
$driver->setSemanticVersion('8.1.0');

$rule = new ReportingDescriptor('no-unused-vars');
$rule->setShortDescription(new MultiformatMessageString('disallow unused variables'));
$rule->setHelpUri('https://eslint.org/docs/rules/no-unused-vars');
$properties = new PropertyBag();
$properties->addProperty('category', 'Variables');
$rule->setProperties($properties);
$driver->addRules([$rule]);

$tool = new Tool($driver);

$message = new Message("'x' is assigned a value but never used.");
$result = new Result($message);
$result->setLevel('error');
$result->setRuleId('no-unused-vars');
$result->setRuleIndex(0);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
