<!-- markdownlint-disable MD013 -->
# toolComponentReference object

A `toolComponentReference` object identifies a particular `toolComponent` object,
either theTool.driver or an element of theTool.extensions. We refer to the identified toolComponent object as theComponent.

![toolComponentReference object](../assets/images/reference-tool-component-reference.graphviz.svg)

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
                            "id": "CA1000",
                            "relationships": [
                                {
                                    "target": {
                                        "index": 0,
                                        "id": "327",
                                        "guid": "33333333-0000-1111-8888-111111111111",
                                        "toolComponent": {
                                            "name": "CWE",
                                            "guid": "33333333-0000-1111-8888-000000000000"
                                        }
                                    },
                                    "kinds": [
                                        "superset"
                                    ]
                                }
                            ]
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

See full [`examples/reportingDescriptorRelationship.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/reportingDescriptorRelationship.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\ReportingDescriptorReference;
use Bartlett\Sarif\Definition\ReportingDescriptorRelationship;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Definition\ToolComponentReference;
use Bartlett\Sarif\SarifLog;

$target = new ReportingDescriptorReference(0, '327', '33333333-0000-1111-8888-111111111111');
$toolComponent = new ToolComponentReference();
$toolComponent->setName('CWE');
$toolComponent->setGuid('33333333-0000-1111-8888-000000000000');
$target->setToolComponent($toolComponent);

```
