<!-- markdownlint-disable MD013 -->
# suppression object

A `suppression` object describes a request to suppress a result.

![suppression object](../assets/images/reference-suppression.graphviz.svg)

## Example

```json
{
    "$schema": "https://json.schemastore.org/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "Psalm",
                    "version": "4.x-dev",
                    "informationUri": "https://psalm.de"
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

See full [`examples/suppression.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/suppression.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Suppression;

$suppression = new Suppression('inSource');
$suppression->setGuid('11111111-1111-1111-8888-111111111111');
$suppression->setStatus('underReview');
$suppression->setJustification('result outdated');

$result = new Result(new Message('Request to suppress a result'));
$result->addSuppressions([$suppression]);

```
