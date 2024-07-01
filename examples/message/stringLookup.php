<?php
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

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule = new ReportingDescriptor();
$rule->setId('CS0001');
$default = new MultiformatMessageString();
$default->setText('This is the message text. It might be very long.');
$rule->addMessageStrings([
    'default' => $default,
]);
$driver->addRules([$rule]);

$tool = new Tool();
$tool->setDriver($driver);

$message = new Message();
$message->setText(
    'A message object can directly contain message strings in its text and markdown properties.'
    . ' It can also indirectly refer to message strings through its id property.'
);

$result = new Result();
$result->setRuleId('CS0001');
$result->setRuleIndex(0);
$message = new Message();
$message->setId('default');
$result->setMessage($message);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);
