<!-- markdownlint-disable MD013 -->
# rectangle object

A `rectangle` object specifies a rectangular area within an image.
When a SARIF viewer displays an image, it MAY indicate the presence of these areas,
for example, by highlighting them or surrounding them with a border.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317701).

## Example

```json
{
    "$schema": "https:\/\/json.schemastore.org\/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "CodeScanner",
                    "fullName": "CodeScanner 1.1, Developer Preview (en-US)",
                    "version": "1.1.2b12",
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https:\/\/codeScanner.dev"
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
                                "uri": "file:\/\/\/C:\/ScanOutput\/image001.png"
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

See `examples/rectangle.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Attachment;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Rectangle;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setFullName('CodeScanner 1.1, Developer Preview (en-US)');
$driver->setSemanticVersion('1.1.2-beta.12');
$driver->setVersion('1.1.2b12');

$tool = new Tool($driver);

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

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
