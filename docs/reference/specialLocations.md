<!-- markdownlint-disable MD013 -->
# specialLocations object

A `specialLocations` object defines locations of special significance to SARIF consumers.

![specialLocations object](../assets/images/reference-special-locations.graphviz.svg)

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
                "WEBHOST": {
                    "uri": "http://www.example.com/"
                },
                "ROOT": {
                    "uri": "file:///"
                },
                "HOME": {
                    "uri": "home/user/",
                    "uriBaseId": "ROOT"
                },
                "PACKAGE": {
                    "uri": "mySoftware/",
                    "uriBaseId": "HOME"
                },
                "SRC": {
                    "uri": "src/",
                    "uriBaseId": "PACKAGE"
                }
            },
            "specialLocations": {
                "displayBase": {
                    "uriBaseId": "PACKAGE"
                }
            },
            "results": []
        }
    ]
}
```

## How to generate

See full [`examples/specialLocations.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/specialLocations.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\SpecialLocations;

$package = new ArtifactLocation();
$package->setUri('mySoftware/');
$package->setUriBaseId('HOME');

$run = new Run($tool);
$run->addAdditionalProperties([
    'PACKAGE' => $package,
]);

$specialLocations = new SpecialLocations();
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('');
$artifactLocation->setUriBaseId('PACKAGE');
$specialLocations->setDisplayBase($artifactLocation);

$run->setSpecialLocations($specialLocations);

```
