<!-- markdownlint-disable MD013 -->
# conversion object

A `conversion` object describes how a converter transformed the output of an analysis tool
from the analysis tool’s native output format into the SARIF format.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317597).

## Example

```json
{
    "$schema": "https:\/\/json.schemastore.org\/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "AndroidStudio",
                    "semanticVersion": "1.0.0-beta.1",
                    "informationUri": "https:\/\/android-studion.dev"
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

See `examples/conversion.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Conversion;
use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('AndroidStudio');
$driver->setInformationUri('https://android-studion.dev');
$driver->setSemanticVersion('1.0.0-beta.1');
$tool = new Tool($driver);

$converter = new Tool(new ToolComponent('SARIF SDK Multitool'));

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

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
