<!-- markdownlint-disable MD013 -->
# attachment object

An `attachment` object describes an artifact relevant to the detection of a result.

![attachment object](../assets/images/reference-attachment.graphviz.svg)

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

See full [`examples/attachment.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/attachment.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Attachment;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Result;

$attachment = new Attachment();
$attachment->setDescription(new Message('Screen shot'));
$attachment->setArtifactLocation(new ArtifactLocation('file:///C:/ScanOutput/image001.png'));

$result = new Result(new Message('Have a look on screen shot provided'));
$result->addAttachments([$attachment]);

```
