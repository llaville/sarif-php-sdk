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
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('ESLint');
$driver->setInformationUri('https://eslint.org');
$driver->setSemanticVersion('8.1.0');

$rule = new ReportingDescriptor();
$rule->setId('no-unused-vars');
$desc = new MultiformatMessageString();
$desc->setText('disallow unused variables');
$rule->setShortDescription($desc);
$rule->setHelpUri('https://eslint.org/docs/rules/no-unused-vars');
$properties = new PropertyBag();
$properties->addProperty('category', 'Variables');
$rule->setProperties($properties);
$driver->addRules([$rule]);

$tool = new Tool();
$tool->setDriver($driver);

$message = new Message();
$message->setText("'x' is assigned a value but never used.");

$result = new Result();
$result->setMessage($message);
$result->setLevel('error');
$result->setRuleId('no-unused-vars');
$result->setRuleIndex(0);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);
