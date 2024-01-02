<!-- markdownlint-disable MD013 -->
# exception object

An `exception` object describes a runtime exception encountered during the execution of an analysis tool.
This includes signals in POSIX-conforming operating systems.

![exception object](../assets/images/reference-exception.graphviz.svg)

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
                            "exception": {
                                "message": "Exception evaluating rule 'C2001'"
                            },
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

See full [`examples/exception.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/exception.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Exception;
use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\Notification;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\ReportingDescriptorReference;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;

$notification = new Notification(new Message("Exception evaluating rule 'C2001'. Rule configuration is missing."));
$notification->setAssociatedRule(new ReportingDescriptorReference(0, 'C2001'));
$notification->setDescriptor(new ReportingDescriptorReference(1, 'CTN9999'));
$notification->setLevel('error');
$exception = new Exception();
$exception->setMessage("Exception evaluating rule 'C2001'");
$notification->setRuntimeException($exception);
$invocation = new Invocation(true);
$invocation->addToolExecutionNotifications([$notification]);

$result = new Result(new Message('...'));
$result->setRuleId('CTN9999');

$run = new Run($tool);
$run->addResults([$result]);
$run->addInvocations([$invocation]);

```
