<!-- markdownlint-disable MD013 -->
# rectangle object

A `rectangle` object specifies a rectangular area within an image.
When a SARIF viewer displays an image, it MAY indicate the presence of these areas,
for example, by highlighting them or surrounding them with a border.

![rectangle object](../assets/images/reference-rectangle.graphviz.svg)

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
                    "fullName": "CodeScanner 1.1, Developer Preview (en-US)",
                    "version": "1.1.2b12",
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https://codeScanner.dev"
                }
            },
            "results": [
                {
                    "message": {
                        "text": "Have a look on screen shot provided"
                    },
                    "attachments": [
                        {
                            "artifactLocation": {
                                "uri": "file:///C:/ScanOutput/image001.png"
                            },
                            "description": {
                                "text": "Screen shot"
                            },
                            "rectangles": [
                                {
                                    "top": 80,
                                    "left": 10,
                                    "bottom": 5,
                                    "right": 90
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]
}
```

## How to generate

See full [`examples/rectangle.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/rectangle.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Attachment;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Rectangle;
use Bartlett\Sarif\Definition\Result;

$attachment = new Attachment();
$attachment->setDescription(new Message('Screen shot'));
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('file:///C:/ScanOutput/image001.png');
$attachment->setArtifactLocation($artifactLocation);
$rectangle = new Rectangle();
$rectangle->setTop(80);
$rectangle->setLeft(10);
$rectangle->setBottom(5);
$rectangle->setRight(90);
$attachment->addRectangles([$rectangle]);

$result = new Result(new Message('Have a look on screen shot provided'));
$result->addAttachments([$attachment]);

```
