<!-- markdownlint-disable MD013 -->
# threadFlowLocation object

A `threadFlowLocation` object represents a location visited by an analysis tool
in the course of simulating or monitoring the execution of a program.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317751).

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
            "results": [
                {
                    "message": {
                        "text": "A result object"
                    },
                    "codeFlows": [
                        {
                            "threadFlows": [
                                {
                                    "locations": [
                                        {
                                            "location": {
                                                "physicalLocation": {
                                                    "artifactLocation": {
                                                        "uri": "ui\/window.c",
                                                        "uriBaseId": "SRCROOT"
                                                    },
                                                    "region": {
                                                        "startLine": 42
                                                    }
                                                }
                                            },
                                            "state": {
                                                "x": {
                                                    "text": "42"
                                                },
                                                "y": {
                                                    "text": "54"
                                                },
                                                "x+y": {
                                                    "text": "96"
                                                }
                                            },
                                            "nestingLevel": 0,
                                            "executionOrder": 2
                                        }
                                    ],
                                    "id": "thread-123",
                                    "message": {
                                        "text": "A threadFlow object"
                                    }
                                }
                            ],
                            "message": {
                                "text": "A codeFlow object"
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

See `examples/codeFlow.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\CodeFlow;
use Bartlett\Sarif\Definition\Location;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\ThreadFlow;
use Bartlett\Sarif\Definition\ThreadFlowLocation;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

$threadFlowLocation = new ThreadFlowLocation();
$location = new Location();
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('ui/window.c');
$artifactLocation->setUriBaseId('SRCROOT');
$physicalLocation = new PhysicalLocation($artifactLocation);
$physicalLocation->setRegion(new Region(42));
$location->setPhysicalLocation($physicalLocation);
$threadFlowLocation->setLocation($location);
$threadFlowLocation->addAdditionalProperties([
    'x' => new MultiformatMessageString('42'),
    'y' => new MultiformatMessageString('54'),
    'x+y' => new MultiformatMessageString('96'),
]);
$threadFlowLocation->setNestingLevel(0);
$threadFlowLocation->setExecutionOrder(2);

$threadFlow = new ThreadFlow([$threadFlowLocation]);
$threadFlow->setId('thread-123');
$threadFlow->setMessage(new Message('A threadFlow object'));

$codeFlow = new CodeFlow([$threadFlow]);
$codeFlow->setMessage(new Message('A codeFlow object'));

$result = new Result(new Message('A result object'));
$result->addCodeFlows([$codeFlow]);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
