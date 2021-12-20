<!-- markdownlint-disable MD013 -->
# attachment object

An `attachment` object describes an artifact relevant to the detection of a result.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317591).

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

See `examples/attachment.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Attachment;
use Bartlett\Sarif\Definition\Message;
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
$attachment->setArtifactLocation(new ArtifactLocation('file:///C:/ScanOutput/image001.png'));

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
