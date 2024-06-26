<!-- markdownlint-disable MD013 -->
# stack object

A `stack` object describes a single call stack.
A call stack is a sequence of nested function calls, each of which is referred to as a stack frame.

![stack object](../assets/images/reference-stack.graphviz.svg)

## Example

```json
{
    "$schema": "https://json.schemastore.org/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "SarifSamples",
                    "version": "1.0",
                    "informationUri": "https://github.com/microsoft/sarif-tutorials/"
                }
            },
            "results": [
                {
                    "message": {
                        "text": "Uninitialized variable."
                    },
                    "ruleId": "TUT1001",
                    "locations": [
                        {
                            "physicalLocation": {
                                "artifactLocation": {
                                    "uri": "collections/list.h",
                                    "uriBaseId": "SRCROOT"
                                },
                                "region": {
                                    "startLine": 15
                                }
                            },
                            "logicalLocations": [
                                {
                                    "fullyQualifiedName": "collections::list::add"
                                }
                            ]
                        }
                    ],
                    "stacks": [
                        {
                            "frames": [
                                {
                                    "location": {
                                        "physicalLocation": {
                                            "artifactLocation": {
                                                "uri": "collections/list.h",
                                                "uriBaseId": "SRCROOT"
                                            },
                                            "region": {
                                                "startLine": 110,
                                                "startColumn": 15
                                            }
                                        },
                                        "logicalLocations": [
                                            {
                                                "fullyQualifiedName": "collections::list::add_core"
                                            }
                                        ]
                                    },
                                    "module": "platform",
                                    "threadId": 52,
                                    "parameters": [
                                        "null",
                                        "0",
                                        "14"
                                    ]
                                }
                            ],
                            "message": {
                                "text": "Call stack resulting from usage of uninitialized variable."
                            }
                        }
                    ]
                }
            ]
        }
    ]
}
```

## How to generate

See full [`examples/stack.php`][example-script] script into repository.

> [!NOTE]
> Since release 1.5.0, you may use fluent builders API as alternative.
> See full [`examples/builder/stack.php`][example-builder] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/stack.php
[example-builder]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/builder/stack.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Location;
use Bartlett\Sarif\Definition\LogicalLocation;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Stack;
use Bartlett\Sarif\Definition\StackFrame;

$frame = new StackFrame();

$location = new Location();
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('collections/list.h');
$artifactLocation->setUriBaseId('SRCROOT');
$physicalLocation = new PhysicalLocation($artifactLocation);
$physicalLocation->setRegion(new Region(110, 15));
$location->setPhysicalLocation($physicalLocation);
$logicalLocation = new LogicalLocation();
$logicalLocation->setFullyQualifiedName('collections::list::add_core');
$location->addLogicalLocations([$logicalLocation]);
$frame->setLocation($location);
$frame->setModule('platform');
$frame->setThreadId(52);
$frame->addParameters(['null', '0', '14']);

$stack = new Stack([$frame]);
$stack->setMessage(new Message('Call stack resulting from usage of uninitialized variable.'));

```
