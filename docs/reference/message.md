<!-- markdownlint-disable MD013 -->
# message object

Certain objects in this document define messages intended to be viewed by a user.
SARIF represents such a message with a `message` object, which offers the following features:

- Message strings in plain text (“plain text messages”).
- Message strings that incorporate formatting information (“formatted messages”) in GitHub Flavored Markdown.
- Message strings with placeholders for variable information.
- Message strings with embedded links.

![message object](../assets/images/reference-message.graphviz.svg)

## PlainText Example

```json
{
    "$schema": "https://json.schemastore.org/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "ESLint",
                    "semanticVersion": "8.1.0",
                    "informationUri": "https://eslint.org",
                    "rules": [
                        {
                            "id": "no-unused-vars",
                            "shortDescription": {
                                "text": "disallow unused variables"
                            },
                            "helpUri": "https://eslint.org/docs/rules/no-unused-vars",
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
                        "text": "Tainted data was used. The data came from [here](3)."
                    },
                    "ruleId": "TNT0001",
                    "relatedLocations": [
                        {
                            "id": 3,
                            "physicalLocation": {
                                "artifactLocation": {
                                    "uri": "file:///C:/code/input.c"
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
    "$schema": "https://json.schemastore.org/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "CodeScanner",
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https://codeScanner.dev",
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

See full [`examples/message/plainText.php`][example-script-1] script into repository.

[example-script-1]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/message/plainText.php

```php
<?php

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Result;

$message = new Message("'x' is assigned a value but never used.");
$result = new Result($message);
$result->setLevel('error');
$result->setRuleId('no-unused-vars');
$result->setRuleIndex(0);

```

See full [`examples/message/formatted.php`][example-script-2] script into repository.

[example-script-2]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/message/formatted.php

```php
<?php

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Result;

$message = new Message("Variable '{0}' is uninitialized.");
$message->addArguments(['pBuffer']);
$result = new Result($message);
$result->setRuleId('CA2101');

```

See full [`examples/message/embeddedLinks.php`][example-script-3] script into repository.

[example-script-3]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/message/embeddedLinks.php

```php
<?php

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Location;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Result;

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

```

See full [`examples/message/stringLookup.php`][example-script-4] script into repository.

[example-script-4]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/message/stringLookup.php

```php
<?php

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;

$rule = new ReportingDescriptor('no-unused-vars');
$rule->setId('CS0001');
$rule->addMessageStrings([
    'default' => new MultiformatMessageString('This is the message text. It might be very long.'),
]);

$message = new Message(
    'A message object can directly contain message strings in its text and markdown properties.'
    . ' It can also indirectly refer to message strings through its id property.'
);
$result = new Result($message);
$result->setRuleId('CS0001');
$result->setRuleIndex(0);
$result->setMessage(new Message('', 'default'));

```
