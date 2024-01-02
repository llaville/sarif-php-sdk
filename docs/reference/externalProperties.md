<!-- markdownlint-disable MD013 -->
# externalProperties object

The top-level element of an external property file SHALL be an object which we refer to as an `externalProperties` object.

![externalProperties object](../assets/images/reference-external-properties.graphviz.svg)

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
            "results": []
        }
    ],
    "inlineExternalProperties": [
        {
            "schema": "https://json.schemastore.org/sarif-2.1.0.json",
            "version": "2.1.0",
            "guid": "00001111-2222-1111-8888-555566667777",
            "runGuid": "88889999-AAAA-1111-8888-DDDDEEEEFFFF",
            "externalizedProperties": {
                "team": "Security Assurance Team"
            },
            "artifacts": [
                {
                    "location": {
                        "uri": "apple.png"
                    },
                    "mimeType": "image/png"
                },
                {
                    "location": {
                        "uri": "banana.png"
                    },
                    "mimeType": "image/png"
                }
            ]
        }
    ]
}
```

## How to generate

See full [`examples/externalProperties.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/externalProperties.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Artifact;
use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\ExternalProperties;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\SarifLog;

$apple = new Artifact();
$location = new ArtifactLocation();
$location->setUri('apple.png');
$apple->setLocation($location);
$apple->setMimeType('image/png');

$banana = new Artifact();
$location = new ArtifactLocation();
$location->setUri('banana.png');
$banana->setLocation($location);
$banana->setMimeType('image/png');

$propertyBag = new PropertyBag();
$propertyBag->addProperty('team', 'Security Assurance Team');

$run = new Run($tool);

$log = new SarifLog([$run]);
$externalProperties = new ExternalProperties();
$externalProperties->setGuid('00001111-2222-1111-8888-555566667777');
$externalProperties->setRunGuid('88889999-AAAA-1111-8888-DDDDEEEEFFFF');
$externalProperties->addArtifacts([$apple, $banana]);
$externalProperties->setExternalizedProperties($propertyBag);
$log->addInlineExternalProperties([$externalProperties]);

```
