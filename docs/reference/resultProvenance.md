<!-- markdownlint-disable MD013 -->
# resultProvenance object

A `resultProvenance` object contains information about the how and when theResult was detected.

![resultProvenance object](../assets/images/reference-result-provenance.graphviz.svg)

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
                        "text": "Assertions are unreliable."
                    },
                    "ruleId": "Assertions",
                    "provenance": {
                        "conversionSources": [
                            {
                                "artifactLocation": {
                                    "uri": "CodeScanner.log",
                                    "uriBaseId": "LOGSROOT"
                                },
                                "region": {
                                    "startLine": 3,
                                    "startColumn": 3,
                                    "endLine": 12,
                                    "endColumn": 13,
                                    "snippet": {
                                        "text": "<problem>...</problem>"
                                    }
                                }
                            }
                        ]
                    }
                }
            ]
        }
    ]
}
```

## How to generate

See full [`examples/resultProvenance.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/resultProvenance.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactContent;
use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\ResultProvenance;

$provenance = new ResultProvenance();
$fromSources = [];
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('CodeScanner.log');
$artifactLocation->setUriBaseId('LOGSROOT');
$fromSources[0] = new PhysicalLocation($artifactLocation);
$region = new Region(3, 3, 12, 13);
$snippet = new ArtifactContent();
$snippet->setText('<problem>...</problem>');
$region->setSnippet($snippet);
$fromSources[0]->setRegion($region);

$provenance->addConversionSources($fromSources);

$result = new Result(new Message('Assertions are unreliable.'));
$result->setProvenance($provenance);

```
