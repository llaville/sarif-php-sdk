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

$driver = new ToolComponent('ESLint');
$driver->setInformationUri('https://eslint.org');
$driver->setSemanticVersion('8.1.0');

$rule = new ReportingDescriptor('no-unused-vars');
$rule->setShortDescription(new MultiformatMessageString('disallow unused variables'));
$rule->setHelpUri('https://eslint.org/docs/rules/no-unused-vars');
$properties = new PropertyBag();
$properties->addProperty('category', 'Variables');
$rule->setProperties($properties);
$driver->addRules([$rule]);

$tool = new Tool($driver);

$message = new Message("'x' is assigned a value but never used.");
$result = new Result($message);
$result->setLevel('error');
$result->setRuleId('no-unused-vars');
$result->setRuleIndex(0);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
