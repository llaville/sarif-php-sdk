<!-- markdownlint-disable MD013 -->
# versionControlDetails object

A `versionControlDetails` object specifies the information necessary to retrieve from a version control system (VCS)
the correct revision of the files that were scanned during the run.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317602).

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
            "versionControlProvenance": [
                {
                    "repositoryUri": "https:\/\/github.com\/example-corp\/package",
                    "revisionId": "b87c4e9",
                    "mappedTo": {
                        "uriBaseId": "PACKAGE_ROOT"
                    }
                },
                {
                    "repositoryUri": "https:\/\/github.com\/example-corp\/plugin1",
                    "revisionId": "cafdac7",
                    "mappedTo": {
                        "uri": "plugin1",
                        "uriBaseId": "PACKAGE_ROOT"
                    }
                },
                {
                    "repositoryUri": "https:\/\/github.com\/example-corp\/plugin2",
                    "revisionId": "d0dc2c0",
                    "mappedTo": {
                        "uri": "plugin2",
                        "uriBaseId": "PACKAGE_ROOT"
                    }
                }
            ],
            "results": []
        }
    ]
}
```

## How to generate

See `examples/versionControlDetails.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Conversion;
use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Definition\VersionControlDetails;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('AndroidStudio');
$driver->setInformationUri('https://android-studion.dev');
$driver->setSemanticVersion('1.0.0-beta.1');
$tool = new Tool($driver);

$package = new VersionControlDetails('https://github.com/example-corp/package');
$package->setRevisionId('b87c4e9');
$packageMappedTo = new ArtifactLocation();
$packageMappedTo->setUriBaseId('PACKAGE_ROOT');
$package->setMappedTo($packageMappedTo);

$plugin1 = new VersionControlDetails('https://github.com/example-corp/plugin1');
$plugin1->setRevisionId('cafdac7');
$plugin1MappedTo = new ArtifactLocation();
$plugin1MappedTo->setUriBaseId('PACKAGE_ROOT');
$plugin1MappedTo->setUri('plugin1');
$plugin1->setMappedTo($plugin1MappedTo);

$plugin2 = new VersionControlDetails('https://github.com/example-corp/plugin2');
$plugin2->setRevisionId('d0dc2c0');
$plugin2MappedTo = new ArtifactLocation();
$plugin2MappedTo->setUriBaseId('PACKAGE_ROOT');
$plugin2MappedTo->setUri('plugin2');
$plugin2->setMappedTo($plugin2MappedTo);

$run = new Run($tool);
$run->addVersionControlDetails([$package, $plugin1, $plugin2]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
