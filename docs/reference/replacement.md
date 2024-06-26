<!-- markdownlint-disable MD013 -->
# replacement object

A `replacement` object represents the replacement of a single region of an artifact.

![replacement object](../assets/images/reference-replacement.graphviz.svg)

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
            "results": [
                {
                    "message": {
                        "text": "..."
                    },
                    "ruleId": "CA1001",
                    "fixes": [
                        {
                            "artifactChanges": [
                                {
                                    "artifactLocation": {
                                        "uri": "src/a.c"
                                    },
                                    "replacements": [
                                        {
                                            "deletedRegion": {
                                                "startLine": 1,
                                                "startColumn": 1,
                                                "endLine": 1
                                            },
                                            "insertedContent": {
                                                "text": "// "
                                            }
                                        }
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

See full [`examples/fix.php`][example-script] script into repository.

> [!NOTE]
> Since release 1.5.0, you may use fluent builders API as alternative.
> See full [`examples/builder/fix.php`][example-builder] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/fix.php
[example-builder]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/builder/fix.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactChange;
use Bartlett\Sarif\Definition\ArtifactContent;
use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Replacement;

$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('src/a.c');
$replacement = new Replacement(new Region(1, 1, 1));
$insertedContent = new ArtifactContent();
$insertedContent->setText('// ');
$replacement->setInsertedContent($insertedContent);
$artifactChange = new ArtifactChange($artifactLocation, [$replacement]);

```
