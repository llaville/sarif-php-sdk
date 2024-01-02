<!-- markdownlint-disable MD013 -->
# translationMetadata object

A `translationMetadata` object defines locations of special significance to SARIF consumers.

![translationMetadata object](../assets/images/reference-translation-metadata.graphviz.svg)

## Example

```json
{
    "$schema": "https://json.schemastore.org/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "(fr-FR translation)",
                    "fullName": "(fr-FR translation of translated component\u2019s full name)",
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https://codeScanner.dev",
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

See full [`examples/translationMetadata.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/translationMetadata.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Definition\TranslationMetadata;

$driver = new ToolComponent('CodeScanner');

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

```
