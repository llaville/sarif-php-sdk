<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Definition\WebRequest;
use Bartlett\Sarif\Definition\WebResponse;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$tool = new Tool();
$tool->setDriver($driver);

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

$run = new Run();
$run->setTool($tool);
$run->addWebRequests([$webRequest]);
$run->addWebResponses([$webResponse]);

$log = new SarifLog([$run]);
