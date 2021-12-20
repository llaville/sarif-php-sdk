<!-- markdownlint-disable MD013 -->
# runAutomationDetails object

A `runAutomationDetails` object contains information that specifies theRun’s identity and role within an engineering system.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317523).

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
                }
            },
            "automationDetails": {
                "description": {
                    "text": "This is the {0} nightly run of the Credential Scanner tool on all product binaries in the '{1}' branch of the '{2}' repo. The scanned binaries are architecture '{3}' and build type '{4}'.",
                    "arguments": [
                        "October 10, 2018",
                        "master",
                        "sarif-sdk",
                        "x86",
                        "debug"
                    ]
                },
                "id": "Nightly CredScan run for sarif-sdk\/master\/x86\/debug\/2018-10-05",
                "guid": "11111111-1111-1111-8888-111111111111",
                "correlationGuid": "22222222-2222-1111-8888-222222222222"
            },
            "results": []
        }
    ]
}
```

## How to generate

See `examples/runAutomationDetails.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\RunAutomationDetails;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setFullName('CodeScanner 1.1, Developer Preview (en-US)');
$driver->setSemanticVersion('1.1.2-beta.12');
$driver->setVersion('1.1.2b12');

$tool = new Tool($driver);

$automationDetails = new RunAutomationDetails();

$text = "This is the {0} nightly run of the Credential Scanner tool on" .
    " all product binaries in the '{1}' branch of the '{2}' repo.".
    " The scanned binaries are architecture '{3}' and build type '{4}'.";
$description = new Message($text);
$description->addArguments([
    "October 10, 2018",
    "master",
    "sarif-sdk",
    "x86",
    "debug",
]);
$automationDetails->setDescription($description);
$automationDetails->setId('Nightly CredScan run for sarif-sdk/master/x86/debug/2018-10-05');
$automationDetails->setGuid('11111111-1111-1111-8888-111111111111');
$automationDetails->setCorrelationGuid('22222222-2222-1111-8888-222222222222');

$run = new Run($tool);
$run->setAutomationDetails($automationDetails);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
