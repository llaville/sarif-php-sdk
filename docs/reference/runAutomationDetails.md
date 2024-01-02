<!-- markdownlint-disable MD013 -->
# runAutomationDetails object

A `runAutomationDetails` object contains information that specifies theRun’s identity and role within an engineering system.

![runAutomationDetails object](../assets/images/reference-run-automation-details.graphviz.svg)

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
                    "fullName": "CodeScanner 1.1, Developer Preview (en-US)",
                    "version": "1.1.2b12",
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https://codeScanner.dev"
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
                "id": "Nightly CredScan run for sarif-sdk/master/x86/debug/2018-10-05",
                "guid": "11111111-1111-1111-8888-111111111111",
                "correlationGuid": "22222222-2222-1111-8888-222222222222"
            },
            "results": []
        }
    ]
}
```

## How to generate

See full [`examples/runAutomationDetails.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/runAutomationDetails.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\RunAutomationDetails;

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

```
