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
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Suppression;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule1 = new ReportingDescriptor();
$rule1->setId('CA1001');
$rule1->addDeprecatedIds(['CA1000']);
$rule2 = new ReportingDescriptor();
$rule2->setId('CA1002');
$rule2->addDeprecatedIds(['CA1000']);
$driver->addRules([$rule1, $rule2]);

$tool = new Tool();
$tool->setDriver($driver);

$message = new Message();
$message->setText('...');

$results = [];
$results[0] = new Result();
$results[0]->setMessage($message);
$results[0]->setRuleId('CA1001');
$results[0]->setBaselineState('unchanged');
$suppression = new Suppression();
$suppression->setKind('inSource');
$results[0]->addSuppressions([$suppression]);

$results[1] = new Result();
$results[1]->setMessage($message);
$results[1]->setRuleId('CA1002');
$results[1]->setBaselineState('updated');
$suppression = new Suppression();
$suppression->setKind('inSource');
$results[1]->addSuppressions([$suppression]);

$run = new Run();
$run->setTool($tool);
$run->addResults($results);

$log = new SarifLog([$run]);
