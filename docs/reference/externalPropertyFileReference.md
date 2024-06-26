<!-- markdownlint-disable MD013 -->
# externalPropertyFileReference object

An `externalPropertyFileReference` object contains information that enables a SARIF consumer
to locate the external property files that contain the values of all externalized properties associated with theRun.

![externalPropertyFileReference object](../assets/images/reference-external-property-file-reference.graphviz.svg)

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
                    "informationUri": "https://codeScanner.dev"
                }
            },
            "originalUriBaseIds": {
                "LOGSDIR": {
                    "uri": "file:///C:/logs/"
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

See full [`examples/externalPropertyFileReferences.php`][example-script] script into repository.

> [!NOTE]
> Since release 1.5.0, you may use fluent builders API as alternative.
> See full [`examples/builder/externalPropertyFileReferences.php`][example-builder] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/externalPropertyFileReferences.php
[example-builder]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/builder/externalPropertyFileReferences.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\ExternalPropertyFileReference;
use Bartlett\Sarif\Definition\ExternalPropertyFileReferences;
use Bartlett\Sarif\Definition\Run;

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

```
