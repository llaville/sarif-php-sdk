<!-- markdownlint-disable MD013 -->
# specialLocations object

A `specialLocations` object defines locations of special significance to SARIF consumers.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317627).

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
            "originalUriBaseIds": {
                "WEBHOST": {
                    "uri": "http:\/\/www.example.com\/"
                },
                "ROOT": {
                    "uri": "file:\/\/\/"
                },
                "HOME": {
                    "uri": "home\/user\/",
                    "uriBaseId": "ROOT"
                },
                "PACKAGE": {
                    "uri": "mySoftware\/",
                    "uriBaseId": "HOME"
                },
                "SRC": {
                    "uri": "src\/",
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

See `examples/specialLocations.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\SpecialLocations;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$tool = new Tool($driver);

$webHost = new ArtifactLocation();
$webHost->setUri('http://www.example.com/');

$root = new ArtifactLocation();
$root->setUri('file:///');

$home = new ArtifactLocation();
$home->setUri('home/user/');
$home->setUriBaseId('ROOT');

$package = new ArtifactLocation();
$package->setUri('mySoftware/');
$package->setUriBaseId('HOME');

$src = new ArtifactLocation();
$src->setUri('src/');
$src->setUriBaseId('PACKAGE');

$run = new Run($tool);
$run->addAdditionalProperties([
    'WEBHOST' => $webHost,
    'ROOT' => $root,
    'HOME' => $home,
    'PACKAGE' => $package,
    'SRC' => $src,
]);

$specialLocations = new SpecialLocations();
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('');
$artifactLocation->setUriBaseId('PACKAGE');
$specialLocations->setDisplayBase($artifactLocation);

$run->setSpecialLocations($specialLocations);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
