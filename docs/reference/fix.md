<!-- markdownlint-disable MD013 -->
# fix object

A `fix` object represents a proposed fix for the problem indicated by theResult. It specifies a set of artifacts to modify.
For each artifact, it specifies regions to remove, and provides new content to insert.

![fix object](../assets/images/reference-fix.graphviz.svg)

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

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/fix.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactChange;
use Bartlett\Sarif\Definition\ArtifactContent;
use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Fix;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Replacement;
use Bartlett\Sarif\Definition\Result;

$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('src/a.c');
$replacement = new Replacement(new Region(1, 1, 1));
$insertedContent = new ArtifactContent();
$insertedContent->setText('// ');
$replacement->setInsertedContent($insertedContent);
$artifactChange = new ArtifactChange($artifactLocation, [$replacement]);

$fix = new Fix([$artifactChange]);

$result = new Result(new Message('...'));
$result->setRuleId('CA1001');
$result->addFixes([$fix]);

```
