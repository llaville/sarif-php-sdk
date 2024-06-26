<!-- markdownlint-disable MD013 -->
# artifactContent object

Certain properties in this document represent the contents of portions of artifacts external to the log file,
for example, artifacts that were scanned by an analysis tool. SARIF represents such content with an `artifactContent` object.
Depending on the circumstances, the SARIF log file might need to represent this content as readable text, raw bytes, or both.

![artifactContent object](../assets/images/reference-artifact-content.graphviz.svg)

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
