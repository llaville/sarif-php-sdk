<!-- markdownlint-disable MD013 -->
# reportingDescriptorRelationship object

A `reportingDescriptorRelationship` object specifies one or more directed relationships
from one `reportingDescriptor` object, which we refer to as theSource, to another one, which we refer to as theTarget.

![reportingDescriptorRelationship object](../assets/images/reference-reporting-descriptor-relationship.graphviz.svg)

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

> [!NOTE]
> Since release 1.5.0, you may use fluent builders API as alternative.
> See full [`examples/builder/reportingDescriptorRelationship.php`][example-builder] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/reportingDescriptorRelationship.php
[example-builder]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/builder/reportingDescriptorRelationship.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\ReportingDescriptorReference;
use Bartlett\Sarif\Definition\ReportingDescriptorRelationship;
use Bartlett\Sarif\Definition\ToolComponentReference;

$rule = new ReportingDescriptor('CA1000');

$target = new ReportingDescriptorReference(0, '327', '33333333-0000-1111-8888-111111111111');
$toolComponent = new ToolComponentReference();
$toolComponent->setName('CWE');
$toolComponent->setGuid('33333333-0000-1111-8888-000000000000');
$target->setToolComponent($toolComponent);

$relationship = new ReportingDescriptorRelationship($target);
$relationship->addKinds(['superset']);
$rule->addRelationships([$relationship]);

```
