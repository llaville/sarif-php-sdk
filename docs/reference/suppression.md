<!-- markdownlint-disable MD013 -->
# suppression object

A `suppression` object describes a request to suppress a result.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317733).

## Example

```json
{
    "$schema": "https:\/\/json.schemastore.org\/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "Psalm",
                    "version": "4.x-dev",
                    "informationUri": "https:\/\/psalm.de"
                }
            },
            "results": [
                {
                    "message": {
                        "text": "Request to suppress a result"
                    },
                    "suppressions": [
                        {
                            "kind": "inSource",
                            "guid": "11111111-1111-1111-8888-111111111111",
                            "status": "underReview",
                            "justification": "result outdated"
                        }
                    ]
                }
            ]
        }
    ]
}
```

## How to generate

See `examples/suppression.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Suppression;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('Psalm');
$driver->setInformationUri('https://psalm.de');
$driver->setVersion('4.x-dev');
$tool = new Tool($driver);

$suppression = new Suppression('inSource');
$suppression->setGuid('11111111-1111-1111-8888-111111111111');
$suppression->setStatus('underReview');
$suppression->setJustification('result outdated');

$result = new Result(new Message('Request to suppress a result'));
$result->addSuppressions([$suppression]);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
