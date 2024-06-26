<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\ReportingConfiguration;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule = new ReportingDescriptor();
$rule->setId('SA2707');
$rule->setName('LimitSourceLineLength');
$desc = new MultiformatMessageString();
$desc->setText('Limit source line length for readability.');
$rule->setShortDescription($desc);
$reportingConf = new ReportingConfiguration();
$propertyBag = new PropertyBag();
$propertyBag->addProperty('maxLength', 120);
$reportingConf->setParameters($propertyBag);
$rule->setDefaultConfiguration($reportingConf);
$driver->addRules([$rule]);

$tool = new Tool();
$tool->setDriver($driver);

$run = new Run();
$run->setTool($tool);

$log = new SarifLog([$run]);
