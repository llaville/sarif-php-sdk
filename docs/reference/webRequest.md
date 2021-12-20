<!-- markdownlint-disable MD013 -->
# webRequest object

A `webRequest` object describes an HTTP request (RFC7230).

See [specification](https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317808).

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
            "webRequests": [
                {
                    "protocol": "http",
                    "version": "1.1",
                    "target": "httpbin.org\/bearer",
                    "method": "GET",
                    "headers": {
                        "accept": "application\/json",
                        "Authorization": "none"
                    }
                }
            ],
            "webResponses": [
                {
                    "protocol": "http",
                    "version": "1.1",
                    "statusCode": 401,
                    "reasonPhrase": "Error: UNAUTHORIZED",
                    "headers": {
                        "access-control-allow-credentials": "true",
                        "access-control-allow-origin": "*",
                        "connection": "keep-alive",
                        "content-length": "0",
                        "content-type": "text\/html; charset=utf-8",
                        "date": "Sun, 07 Nov 2021 08:59:53 GMT",
                        "server": "gunicorn\/19.9.0",
                        "www-authenticate": "Bearer"
                    }
                }
            ],
            "results": []
        }
    ]
}
```

## How to generate

See `examples/webRequest.php` script.

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Definition\WebRequest;
use Bartlett\Sarif\Definition\WebResponse;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

$webRequest = new WebRequest();
$webRequest->setProtocol('http');
$webRequest->setVersion('1.1');
$webRequest->setMethod('GET');
$webRequest->setTarget('httpbin.org/bearer');
$webRequest->addAdditionalPropertiesHeaders([
    'accept' => 'application/json',
    'Authorization' => 'none',
]);

$webResponse = new WebResponse();
$webResponse->setProtocol('http');
$webResponse->setVersion('1.1');
$webResponse->setStatusCode(401);
$webResponse->setReasonPhrase('Error: UNAUTHORIZED');
$webResponse->addAdditionalProperties([
    'access-control-allow-credentials' => 'true',
    'access-control-allow-origin' => '*',
    'connection' => 'keep-alive',
    'content-length' => '0',
    'content-type' => 'text/html; charset=utf-8',
    'date' => 'Sun, 07 Nov 2021 08:59:53 GMT',
    'server' => 'gunicorn/19.9.0',
    'www-authenticate' => 'Bearer',
]);

$run = new Run($tool);
$run->addWebRequests([$webRequest]);
$run->addWebResponses([$webResponse]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
```
