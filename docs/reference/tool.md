<!-- markdownlint-disable MD013 -->
# tool object

A `tool` object describes the analysis tool or converter that was run.

![tool object](../assets/images/reference-tool.graphviz.svg)

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
                },
                "extensions": [
                    {
                        "name": "CodeScanner Security Rules",
                        "version": "3.1"
                    }
                ]
            },
            "results": []
        }
    ]
}
```

## How to generate

See full [`examples/tool.php`][example-script] script into repository.

> [!NOTE]
> Since release 1.5.0, you may use fluent builders API as alternative.
> See full [`examples/builder/tool.php`][example-builder] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/tool.php
[example-builder]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/builder/tool.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;

$driver = new ToolComponent('CodeScanner');

$tool = new Tool($driver);

```
