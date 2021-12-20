<!-- markdownlint-disable MD013 -->
# externalPropertyFileReferences object

An `externalPropertyFileReferences` object contains information that enables a SARIF consumer
to locate the external property files that contain the values of all externalized properties associated with theRun.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317513).

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
            "originalUriBaseIds": {
                "LOGSDIR": {
                    "uri": "file:\/\/\/C:\/logs\/"
                }
            },
            "externalPropertyFileReferences": {
                "conversion": {
                    "location": {
                        "uri": "scantool.conversion.sarif-external-properties",
                        "uriBaseId": "LOGSDIR"
                    },
                    "guid": "11111111-1111-1111-8888-111111111111"
                },
                "results": [
                    {
                        "location": {
                            "uri": "scantool.results-1.sarif-external-properties",
                            "uriBaseId": "LOGSDIR"
                        },
                        "guid": "22222222-2222-1111-8888-222222222222",
                        "itemCount": 1000
                    },
                    {
                        "location": {
                            "uri": "scantool.results-2.sarif-external-properties",
                            "uriBaseId": "LOGSDIR"
                        },
                        "guid": "33333333-3333-1111-8888-333333333333",
                        "itemCount": 4277
                    }
                ]
            },
            "results": []
        }
    ]
}
```

## How to generate

See `examples/externalPropertyFileReferences.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\ExternalPropertyFileReference;
use Bartlett\Sarif\Definition\ExternalPropertyFileReferences;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

$run = new Run($tool);
$logsDir = new ArtifactLocation();
$logsDir->setUri('file:///C:/logs/');
$run->addAdditionalProperties([
    'LOGSDIR' => $logsDir,
]);

$location = new ArtifactLocation();
$location->setUri('scantool.conversion.sarif-external-properties');
$location->setUriBaseId('LOGSDIR');
$conversion = new ExternalPropertyFileReference($location, '11111111-1111-1111-8888-111111111111');

$location = new ArtifactLocation();
$location->setUri('scantool.results-1.sarif-external-properties');
$location->setUriBaseId('LOGSDIR');
$resultRef1 = new ExternalPropertyFileReference($location, '22222222-2222-1111-8888-222222222222');
$resultRef1->setItemCount(1000);

$location = new ArtifactLocation();
$location->setUri('scantool.results-2.sarif-external-properties');
$location->setUriBaseId('LOGSDIR');
$resultRef2 = new ExternalPropertyFileReference($location, '33333333-3333-1111-8888-333333333333');
$resultRef2->setItemCount(4277);

$externalPropertyFileReferences = new ExternalPropertyFileReferences();
$externalPropertyFileReferences->setConversion($conversion);
$externalPropertyFileReferences->addResults([$resultRef1, $resultRef2]);
$run->setExternalPropertyFileReferences($externalPropertyFileReferences);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
