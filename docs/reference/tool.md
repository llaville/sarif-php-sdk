<!-- markdownlint-disable MD013 -->
# tool object

A `tool` object describes the analysis tool or converter that was run.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317529).

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
                    "fullName": "CodeScanner 1.1, Developer Preview (en-US)",
                    "version": "1.1.2b12",
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https:\/\/codeScanner.dev"
                },
                "extensions": [
                    {
                        "name": "CodeScanner Security Rules",
                        "version": "3.1"
                    }
                ]
            },
            "results": []
        }
    ]
}
```

## How to generate

See `examples/tool.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setFullName('CodeScanner 1.1, Developer Preview (en-US)');
$driver->setSemanticVersion('1.1.2-beta.12');
$driver->setVersion('1.1.2b12');

$extension = new ToolComponent('CodeScanner Security Rules');
$extension->setVersion('3.1');

$tool = new Tool($driver);
$tool->addExtensions([$extension]);

$run = new Run($tool);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
