<!-- markdownlint-disable MD013 -->
# reportingDescriptorReference object

A `reportingDescriptorReference` object identifies a particular `reportingDescriptor` object,
which we refer to as theDescriptor, among all `reportingDescriptor` objects defined by theTool,
including those defined by theTool.driver and theTool.extensions.

![reportingDescriptorReference object](../assets/images/reference-reporting-descriptor-reference.graphviz.svg)

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

See full [`examples/reportingDescriptorReference.php`][example-script] script into repository.

> [!NOTE]
> Since release 1.5.0, you may use fluent builders API as alternative.
> See full [`examples/builder/reportingDescriptorReference.php`][example-builder] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/reportingDescriptorReference.php
[example-builder]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/builder/reportingDescriptorReference.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Notification;
use Bartlett\Sarif\Definition\ReportingDescriptorReference;

$notification = new Notification(new Message("Exception evaluating rule 'C2001'. Rule configuration is missing."));
$notification->setAssociatedRule(new ReportingDescriptorReference(0, 'C2001'));
$notification->setDescriptor(new ReportingDescriptorReference(1, 'CTN9999'));
$notification->setLevel('error');
$invocation = new Invocation(true);
$invocation->addToolExecutionNotifications([$notification]);

```
