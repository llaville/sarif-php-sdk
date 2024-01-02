<!-- markdownlint-disable MD013 -->
# result object

A `result` object describes a single result detected by an analysis tool.

![result object](../assets/images/reference-result.graphviz.svg)

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
                            "shortDescription": {
                                "text": "Specify marshaling for P/Invoke string arguments."
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
                    "ruleId": "CA5350/md5",
                    "ruleIndex": 1
                },
                {
                    "message": {
                        "text": "Another result on rule 1"
                    },
                    "ruleId": "CA5350/sha-1",
                    "ruleIndex": 1
                }
            ]
        }
    ]
}
```

## How to generate

See full [`examples/result.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/result.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;

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

```
