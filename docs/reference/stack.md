# stack object

A `stack` object describes a single call stack.
A call stack is a sequence of nested function calls, each of which is referred to as a stack frame.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317798).

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
                        "text": "A result object"
                    },
                    "stacks": [
                        {
                            "frames": [
                                {
                                    "module": "ui\/widget.c",
                                    "threadId": 0
                                }
                            ],
                            "message": {
                                "text": "A stack object"
                            }
                        }
                    ]
                }
            ]
        }
    ]
}
```

## How to generate

See `examples/stack.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Stack;
use Bartlett\Sarif\Definition\StackFrame;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

$frame = new StackFrame();
$frame->setModule('ui/widget.c');
$frame->setThreadId(0);
$stack = new Stack([$frame]);
$stack->setMessage(new Message('A stack object'));

$result = new Result(new Message('A result object'));
$result->addStacks([$stack]);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
