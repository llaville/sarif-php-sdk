<!-- markdownlint-disable MD013 -->
# locationRelationship object

A `locationRelationship` object specifies one or more directed relationships from one location object,
which we refer to as theSource, to another one, which we refer to as theTarget.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317728).

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
                        "text": "A result object with locationRelationship object"
                    },
                    "locations": [
                        {
                            "id": 0,
                            "physicalLocation": {
                                "artifactLocation": {
                                    "uri": "f.h"
                                },
                                "region": {
                                    "startLine": 42
                                }
                            },
                            "relationships": [
                                {
                                    "target": 1,
                                    "kinds": [
                                        "isIncludedBy"
                                    ]
                                }
                            ]
                        }
                    ],
                    "relatedLocations": [
                        {
                            "id": 1,
                            "physicalLocation": {
                                "artifactLocation": {
                                    "uri": "g.h"
                                },
                                "region": {
                                    "startLine": 17
                                }
                            },
                            "relationships": [
                                {
                                    "target": 0,
                                    "kinds": [
                                        "includes"
                                    ]
                                },
                                {
                                    "target": 2,
                                    "kinds": [
                                        "isIncludedBy"
                                    ]
                                }
                            ]
                        },
                        {
                            "id": 2,
                            "physicalLocation": {
                                "artifactLocation": {
                                    "uri": "g.c"
                                },
                                "region": {
                                    "startLine": 8
                                }
                            },
                            "relationships": [
                                {
                                    "target": 1,
                                    "kinds": [
                                        "includes"
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]
}
```

## How to generate

See `examples/locationRelationship.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Location;
use Bartlett\Sarif\Definition\LocationRelationship;
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

$location = [];
$physicalLocation = [];
$artifactLocation = [];
$region = [];
$relationships = [];

$location[0] = new Location();
$location[0]->setId(0);
$artifactLocation[0] = new ArtifactLocation();
$artifactLocation[0]->setUri('f.h');
$physicalLocation[0] = new PhysicalLocation($artifactLocation[0]);
$region[0] = new Region(42);
$physicalLocation[0]->setRegion($region[0]);
$location[0]->setPhysicalLocation($physicalLocation[0]);
$relationships[0] = new LocationRelationship(1);
$relationships[0]->addKinds(['isIncludedBy']);
$location[0]->addRelationships([$relationships[0]]);

$location[1] = new Location();
$location[1]->setId(1);
$artifactLocation[1] = new ArtifactLocation();
$artifactLocation[1]->setUri('g.h');
$physicalLocation[1] = new PhysicalLocation($artifactLocation[1]);
$region[1] = new Region(17);
$physicalLocation[1]->setRegion($region[1]);
$location[1]->setPhysicalLocation($physicalLocation[1]);
$relationships[1] = new LocationRelationship(0);
$relationships[1]->addKinds(['includes']);
$relationships[2] = new LocationRelationship(2);
$relationships[2]->addKinds(['isIncludedBy']);
$location[1]->addRelationships([$relationships[1], $relationships[2]]);

$location[2] = new Location();
$location[2]->setId(2);
$artifactLocation[2] = new ArtifactLocation();
$artifactLocation[2]->setUri('g.c');
$physicalLocation[2] = new PhysicalLocation($artifactLocation[2]);
$region[2] = new Region(8);
$physicalLocation[2]->setRegion($region[2]);
$location[2]->setPhysicalLocation($physicalLocation[2]);
$relationships[2] = new LocationRelationship(1);
$relationships[2]->addKinds(['includes']);
$location[2]->addRelationships([$relationships[2]]);

$result = new Result(new Message('A result object with locationRelationship object'));
$result->addLocations([$location[0]]);
$result->addRelatedLocations([$location[1], $location[2]]);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
