<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule1 = new ReportingDescriptor();
$rule1->setId('CA2101');
$desc = new MultiformatMessageString();
$desc->setText('Specify marshaling for P/Invoke string arguments.');
$rule1->setShortDescription($desc);

$rule2 = new ReportingDescriptor();
$rule2->setId('CA5350');
$desc = new MultiformatMessageString();
$desc->setText('Do not use weak cryptographic algorithms.');
$rule2->setShortDescription($desc);

$driver->addRules([$rule1, $rule2]);

$tool = new Tool();
$tool->setDriver($driver);

$message = new Message();
$message->setText('Result on rule 0');

$result1 = new Result();
$result1->setMessage($message);
$result1->setRuleId('CA2101');
$result1->setRuleIndex(0);

$message = new Message();
$message->setText('Result on rule 1');

$result2 = new Result();
$result2->setMessage($message);
$result2->setRuleId('CA5350/md5');
$result2->setRuleIndex(1);

$message = new Message();
$message->setText('Another result on rule 1');

$result3 = new Result();
$result3->setMessage($message);
$result3->setRuleId('CA5350/sha-1');
$result3->setRuleIndex(1);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result1, $result2, $result3]);

$log = new SarifLog([$run]);
