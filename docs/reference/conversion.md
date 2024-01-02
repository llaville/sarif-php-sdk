<!-- markdownlint-disable MD013 -->
# conversion object

A `conversion` object describes how a converter transformed the output of an analysis tool
from the analysis tool’s native output format into the SARIF format.

![conversion object](../assets/images/reference-conversion.graphviz.svg)

## Example

```json
{
    "$schema": "https://json.schemastore.org/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "AndroidStudio",
                    "semanticVersion": "1.0.0-beta.1",
                    "informationUri": "https://android-studion.dev"
                }
            },
            "conversion": {
                "tool": {
                    "driver": {
                        "name": "SARIF SDK Multitool"
                    }
                },
                "invocation": {
                    "executionSuccessful": true,
                    "commandLine": "Sarif.Multitool.exe convert -t AndroidStudio northwind.log"
                },
                "analysisToolLogFiles": [
                    {
                        "uri": "northwind.log",
                        "uriBaseId": "$LOG_DIR$"
                    }
                ]
            },
            "results": []
        }
    ]
}
```

## How to generate

See full [`examples/conversion.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/conversion.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Conversion;
use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\Run;

$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('northwind.log');
$artifactLocation->setUriBaseId('$LOG_DIR$');

$invocation = new Invocation(true);
$invocation->setCommandLine('Sarif.Multitool.exe convert -t AndroidStudio northwind.log');

$conversion = new Conversion($converter);
$conversion->addAnalysisToolLogFiles([$artifactLocation]);
$conversion->setInvocation($invocation);

$run = new Run($tool);
$run->setConversion($conversion);

```
