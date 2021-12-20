<!-- markdownlint-disable MD013 -->
# artifactContent object

Certain properties in this document represent the contents of portions of artifacts external to the log file,
for example, artifacts that were scanned by an analysis tool. SARIF represents such content with an `artifactContent` object.
Depending on the circumstances, the SARIF log file might need to represent this content as readable text, raw bytes, or both.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317422).

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
                                        "uri": "src\/a.c"
                                    },
                                    "replacements": [
                                        {
                                            "deletedRegion": {
                                                "startLine": 1,
                                                "startColumn": 1,
                                                "endLine": 1
                                            },
                                            "insertedContent": {
                                                "text": "\/\/ "
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

See `examples/fix.php` script.

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
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

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

$run = new Run($tool);
$run->addResults([$result]);


$log = new SarifLog([$run]);


try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
