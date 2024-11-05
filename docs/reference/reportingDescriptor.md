<!-- markdownlint-disable MD013 -->
# reportingDescriptor object

A `reportingDescriptor` object contains information that describes a "reporting item" generated by a tool.

![reportingDescriptor object](../assets/images/reference-reporting-descriptor.graphviz.svg)

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
                            "id": "CA1001",
                            "deprecatedIds": [
                                "CA1000"
                            ]
                        },
                        {
                            "id": "CA1002",
                            "deprecatedIds": [
                                "CA1000"
                            ]
                        }
                    ]
                }
            },
            "results": [
                {
                    "message": {
                        "text": "..."
                    },
                    "ruleId": "CA1001",
                    "suppressions": [
                        {
                            "kind": "inSource"
                        }
                    ],
                    "baselineState": "unchanged"
                },
                {
                    "message": {
                        "text": "..."
                    },
                    "ruleId": "CA1002",
                    "suppressions": [
                        {
                            "kind": "inSource"
                        }
                    ],
                    "baselineState": "updated"
                }
            ]
        }
    ]
}
```

## How to generate

See full [`examples/reportingDescriptor.php`][example-script] script into repository.

> [!NOTE]
> Since release 1.5.0, you may use fluent builders API as alternative.
> See full [`examples/builder/reportingDescriptor.php`][example-builder] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/reportingDescriptor.php
[example-builder]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/builder/reportingDescriptor.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\ToolComponent;

$driver = new ToolComponent('CodeScanner');

$rule1 = new ReportingDescriptor('CA1001');
$rule1->addDeprecatedIds(['CA1000']);
$rule2 = new ReportingDescriptor('CA1002');
$rule2->addDeprecatedIds(['CA1000']);
$driver->addRules([$rule1, $rule2]);

```