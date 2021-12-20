<!-- markdownlint-disable MD013 -->
# address object

An `address` object describes a physical or virtual address,
or a range of addresses, in an “addressable region” (memory or a binary file).

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317705).

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
            "addresses": [
                {
                    "absoluteAddress": 1024,
                    "kind": "module",
                    "name": "Multitool.exe"
                },
                {
                    "absoluteAddress": 1400,
                    "relativeAddress": 376,
                    "kind": "header",
                    "name": "Sections",
                    "offsetFromParent": 376,
                    "parentIndex": 0
                },
                {
                    "absoluteAddress": 1536,
                    "relativeAddress": 512,
                    "kind": "section",
                    "name": ".text",
                    "offsetFromParent": 136,
                    "parentIndex": 1
                }
            ],
            "results": []
        }
    ]
}
```

## How to generate

See `examples/address.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Address;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

$address1 = new Address();
$address1->setName('Multitool.exe');
$address1->setKind('module');
$address1->setAbsoluteAddress(1024);

$address2 = new Address();
$address2->setName('Sections');
$address2->setKind('header');
$address2->setParentIndex(0);
$address2->setOffsetFromParent(376);
$address2->setAbsoluteAddress(1400);
$address2->setRelativeAddress(376);

$address3 = new Address();
$address3->setName('.text');
$address3->setKind('section');
$address3->setParentIndex(1);
$address3->setOffsetFromParent(136);
$address3->setAbsoluteAddress(1536);
$address3->setRelativeAddress(512);

$run = new Run($tool);
$run->addAddresses([$address1, $address2, $address3]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
