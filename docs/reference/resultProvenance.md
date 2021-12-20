<!-- markdownlint-disable MD013 -->
# resultProvenance object

A `resultProvenance` object contains information about the how and when theResult was detected.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317828).

## Example

```json
{
    "$schema": "https:\/\/json.schemastore.org\/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "SarifSamples",
                    "version": "1.0",
                    "informationUri": "https:\/\/github.com\/microsoft\/sarif-tutorials\/"
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
                                        "text": "<problem>...<\/problem>"
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

See `examples/resultProvenance.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactContent;
use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\ResultProvenance;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('SarifSamples');
$driver->setInformationUri('https://github.com/microsoft/sarif-tutorials/');
$driver->setVersion('1.0');

$tool = new Tool($driver);

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
$result->setRuleId('Assertions');
$result->setProvenance($provenance);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
