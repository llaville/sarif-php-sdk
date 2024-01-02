<!-- markdownlint-disable MD013 -->
# webResponse object

A `webResponse` object describes the response to an HTTP request (RFC7230)

![webResponse object](../assets/images/reference-web-response.graphviz.svg)

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
            "webRequests": [
                {
                    "protocol": "http",
                    "version": "1.1",
                    "target": "httpbin.org/bearer",
                    "method": "GET",
                    "headers": {
                        "accept": "application/json",
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
                        "content-type": "text/html; charset=utf-8",
                        "date": "Sun, 07 Nov 2021 08:59:53 GMT",
                        "server": "gunicorn/19.9.0",
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

See full [`examples/webRequest.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/webRequest.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\WebResponse;

$tool = new Tool($driver);

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
$run->addWebResponses([$webResponse]);

```
