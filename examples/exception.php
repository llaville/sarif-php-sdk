<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\Exception;
use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\Notification;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\ReportingDescriptorReference;
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

$ruleV1 = new ReportingDescriptor();
$ruleV1->setId('CTN9999');
$desc = new MultiformatMessageString();
$desc->setText('First version of rule.');
$ruleV1->setShortDescription($desc);

$ruleV2 = new ReportingDescriptor();
$ruleV2->setId('CTN9999');
$desc = new MultiformatMessageString();
$desc->setText('Second version of rule.');
$ruleV2->setShortDescription($desc);

$driver->addRules([$ruleV1, $ruleV2]);

$tool = new Tool();
$tool->setDriver($driver);

$message = new Message();
$message->setText("Exception evaluating rule 'C2001'. Rule configuration is missing.");

$notification = new Notification();
$notification->setMessage($message);
$associatedRule = new ReportingDescriptorReference();
$associatedRule->setIndex(0);
$associatedRule->setId('C2001');
$notification->setAssociatedRule($associatedRule);
$descriptor = new ReportingDescriptorReference();
$descriptor->setIndex(1);
$descriptor->setId('CTN9999');
$notification->setDescriptor($descriptor);
$notification->setLevel('error');
$exception = new Exception();
$exception->setMessage("Exception evaluating rule 'C2001'");
$notification->setException($exception);
$invocation = new Invocation();
$invocation->setExecutionSuccessful(true);
$invocation->addToolExecutionNotifications([$notification]);

$message = new Message();
$message->setText('...');

$result = new Result();
$result->setMessage($message);
$result->setRuleId('CTN9999');

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);
$run->addInvocations([$invocation]);

$log = new SarifLog([$run]);
