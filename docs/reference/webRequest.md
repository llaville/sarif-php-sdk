<!-- markdownlint-disable MD013 -->
# webRequest object

A `webRequest` object describes an HTTP request (RFC7230).

![webRequest object](../assets/images/reference-web-request.graphviz.svg)

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

> [!NOTE]
> Since release 1.5.0, you may use fluent builders API as alternative.
> See full [`examples/builder/webRequest.php`][example-builder] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/webRequest.php
[example-builder]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/builder/webRequest.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\WebRequest;

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

$run = new Run($tool);
$run->addWebRequests([$webRequest]);

```
