<!-- markdownlint-disable MD013 -->
# translationMetadata object

A `translationMetadata` object defines locations of special significance to SARIF consumers.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317630).

## Example

```json
{
    "$schema": "https:\/\/json.schemastore.org\/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "(fr-FR translation)",
                    "fullName": "(fr-FR translation of translated component\u2019s full name)",
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https:\/\/codeScanner.dev",
                    "language": "fr-FR",
                    "translationMetadata": {
                        "name": "CodeScanner translation for fr-FR",
                        "fullName": "CodeScanner translation for fr-FR by Example Corp.",
                        "shortDescription": {
                            "text": "A good translation"
                        },
                        "fullDescription": {
                            "text": "A good translation performed by native en-US speakers."
                        }
                    }
                }
            },
            "results": []
        }
    ]
}
```

## How to generate

See `examples/translationMetadata.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Definition\TranslationMetadata;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$driver->setLanguage('fr-FR');

$translationMetadata = new TranslationMetadata('CodeScanner translation for fr-FR');
$translationMetadata->setFullName('CodeScanner translation for fr-FR by Example Corp.');
$translationMetadata->setShortDescription(
    new MultiformatMessageString('A good translation')
);
$translationMetadata->setFullDescription(
    new MultiformatMessageString('A good translation performed by native en-US speakers.')
);
$driver->setTranslationMetadata($translationMetadata);

$driver->setName('(fr-FR translation)');
$driver->setFullName('(fr-FR translation of translated component’s full name)');

$tool = new Tool($driver);

$run = new Run($tool);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
