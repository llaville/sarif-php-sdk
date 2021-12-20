<!-- markdownlint-disable MD013 -->
# physicalLocation object

A `physicalLocation` object represents the physical location where a result was detected.
A physical location specifies a reference to an artifact together with a region within that artifact.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317678).

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
                        "text": "Identify a physical location where a result was detected."
                    },
                    "locations": [
                        {
                            "physicalLocation": {
                                "artifactLocation": {
                                    "uri": "ui\/window.c",
                                    "uriBaseId": "SRCROOT"
                                },
                                "region": {
                                    "startLine": 42
                                }
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

See `examples/physicalLocation.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Location;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$tool = new Tool($driver);

$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('ui/window.c');
$artifactLocation->setUriBaseId('SRCROOT');

$result = new Result(new Message('Identify a physical location where a result was detected.'));
$location = new Location();
$physicalLocation = new PhysicalLocation($artifactLocation);
$physicalLocation->setRegion(new Region(42));
$location->setPhysicalLocation($physicalLocation);
$result->addLocations([$location]);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
