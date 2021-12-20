<!-- markdownlint-disable MD013 -->
# message object

Certain objects in this document define messages intended to be viewed by a user.
SARIF represents such a message with a `message` object, which offers the following features:

- Message strings in plain text (“plain text messages”).
- Message strings that incorporate formatting information (“formatted messages”) in GitHub Flavored Markdown.
- Message strings with placeholders for variable information.
- Message strings with embedded links.

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317459).

## PlainText Example

```json
{
    "$schema": "https:\/\/json.schemastore.org\/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "ESLint",
                    "semanticVersion": "8.1.0",
                    "informationUri": "https:\/\/eslint.org",
                    "rules": [
                        {
                            "id": "no-unused-vars",
                            "shortDescription": {
                                "text": "disallow unused variables"
                            },
                            "helpUri": "https:\/\/eslint.org\/docs\/rules\/no-unused-vars",
                            "properties": {
                                "category": "Variables"
                            }
                        }
                    ]
                }
            },
            "results": [
                {
                    "message": {
                        "text": "'x' is assigned a value but never used."
                    },
                    "ruleId": "no-unused-vars",
                    "ruleIndex": 0,
                    "level": "error"
                }
            ]
        }
    ]
}
```

## Formatted Example

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
                        "text": "Variable '{0}' is uninitialized.",
                        "arguments": [
                            "pBuffer"
                        ]
                    },
                    "ruleId": "CA2101"
                }
            ]
        }
    ]
}
```

## Embedded links Example

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
                        "text": "Tainted data was used. The data came from [here](3)."
                    },
                    "ruleId": "TNT0001",
                    "relatedLocations": [
                        {
                            "id": 3,
                            "physicalLocation": {
                                "artifactLocation": {
                                    "uri": "file:\/\/\/C:\/code\/input.c"
                                },
                                "region": {
                                    "startLine": 25,
                                    "startColumn": 19
                                }
                            }
                        }
                    ]
                }
            ]
        }
    ]
}
```

## String lookup Example

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
                    "informationUri": "https:\/\/codeScanner.dev",
                    "rules": [
                        {
                            "id": "CS0001",
                            "messageStrings": {
                                "default": {
                                    "text": "This is the message text. It might be very long."
                                }
                            }
                        }
                    ]
                }
            },
            "results": [
                {
                    "message": {
                        "id": "default"
                    },
                    "ruleId": "CS0001",
                    "ruleIndex": 0
                }
            ]
        }
    ]
}
```

## How to generate

See `examples/message/plainText.php` script.

```php
<?php

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$driver = new ToolComponent('ESLint');
$driver->setInformationUri('https://eslint.org');
$driver->setSemanticVersion('8.1.0');

$rule = new ReportingDescriptor('no-unused-vars');
$rule->setShortDescription(new MultiformatMessageString('disallow unused variables'));
$rule->setHelpUri('https://eslint.org/docs/rules/no-unused-vars');
$properties = new PropertyBag();
$properties->addProperty('category', 'Variables');
$rule->setProperties($properties);
$driver->addRules([$rule]);

$tool = new Tool($driver);

$message = new Message("'x' is assigned a value but never used.");
$result = new Result($message);
$result->setLevel('error');
$result->setRuleId('no-unused-vars');
$result->setRuleIndex(0);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```

See `examples/message/formatted.php` script.

```php
<?php

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

$message = new Message("Variable '{0}' is uninitialized.");
$message->addArguments(['pBuffer']);
$result = new Result($message);
$result->setRuleId('CA2101');

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```

See `examples/message/embeddedLinks.php`

```php
<?php

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Location;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

$message = new Message('Tainted data was used. The data came from [here](3).');
$result = new Result($message);
$result->setRuleId('TNT0001');
$location = new Location();
$location->setId('3');
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('file:///C:/code/input.c');
$physicalLocation = new PhysicalLocation($artifactLocation);
$physicalLocation->setRegion(new Region(25, 19));
$location->setPhysicalLocation($physicalLocation);
$result->addRelatedLocations([$location]);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```

See `examples/message/stringLookup.php`

```php
<?php

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule = new ReportingDescriptor('no-unused-vars');
$rule->setId('CS0001');
$rule->addMessageStrings([
    'default' => new MultiformatMessageString('This is the message text. It might be very long.'),
]);
$driver->addRules([$rule]);
$tool = new Tool($driver);

$message = new Message(
    'A message object can directly contain message strings in its text and markdown properties.'
    . ' It can also indirectly refer to message strings through its id property.'
);
$result = new Result($message);
$result->setRuleId('CS0001');
$result->setRuleIndex(0);
$result->setMessage(new Message('', 'default'));

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
