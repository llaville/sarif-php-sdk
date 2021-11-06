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

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$ruleV1 = new ReportingDescriptor('CTN9999');
$ruleV1->setShortDescription(new MultiformatMessageString('First version of rule.'));
$ruleV2 = new ReportingDescriptor('CTN9999');
$ruleV2->setShortDescription(new MultiformatMessageString('Second version of rule.'));

$driver->addRules([$ruleV1, $ruleV2]);

$tool = new Tool($driver);

$notification = new Notification(new Message("Exception evaluating rule 'C2001'. Rule configuration is missing."));
$notification->setAssociatedRule(new ReportingDescriptorReference(0, 'C2001'));
$notification->setDescriptor(new ReportingDescriptorReference(1, 'CTN9999'));
$notification->setLevel('error');
$exception = new Exception();
$exception->setMessage("Exception evaluating rule 'C2001'");
$notification->setRuntimeException($exception);
$invocation = new Invocation(true);
$invocation->addToolExecutionNotifications([$notification]);

$result = new Result(new Message('...'));
$result->setRuleId('CTN9999');

$run = new Run($tool);
$run->addResults([$result]);
$run->addInvocations([$invocation]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (\Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
