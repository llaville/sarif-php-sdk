<!-- markdownlint-disable MD013 -->
# artifact object

An `artifact` object represents a single artifact.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317611).

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
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https:\/\/codeScanner.dev"
                }
            },
            "artifacts": [
                {
                    "location": {
                        "uri": "file:\/\/\/C:\/Code\/app.zip"
                    },
                    "mimeType": "application\/zip"
                },
                {
                    "location": {
                        "uri": "docs\/intro.docx"
                    },
                    "mimeType": "application\/vnd.openxmlformats-officedocument.wordprocessingml.document"
                },
                {
                    "parentIndex": 1,
                    "offset": 17522,
                    "length": 4050,
                    "mimeType": "application\/x-contoso-animation"
                }
            ],
            "results": []
        }
    ]
}
```

## How to generate

See `examples/artifact.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Artifact;
use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$tool = new Tool($driver);

$artifact1 = new Artifact();
$artifactLocation1 = new ArtifactLocation();
$artifactLocation1->setUri('file:///C:/Code/app.zip');
$artifact1->setLocation($artifactLocation1);
$artifact1->setMimeType('application/zip');

$artifact2 = new Artifact();
$artifactLocation2 = new ArtifactLocation();
$artifactLocation2->setUri('docs/intro.docx');
$artifact2->setLocation($artifactLocation2);
$artifact2->setMimeType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
$artifact2->setParentIndex(0);

$artifact3 = new Artifact();
$artifact3->setOffset(17522);
$artifact3->setLength(4050);
$artifact3->setMimeType('application/x-contoso-animation');
$artifact3->setParentIndex(1);

$run = new Run($tool);
$run->addArtifacts([$artifact1, $artifact2, $artifact3]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
