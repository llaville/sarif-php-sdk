<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\ReportingDescriptorReference;
use Bartlett\Sarif\Definition\ReportingDescriptorRelationship;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Definition\ToolComponentReference;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule = new ReportingDescriptor();
$rule->setId('CA1000');

$target = new ReportingDescriptorReference();
$target->setIndex(0);
$target->setId('327');
$target->setGuid('33333333-0000-1111-8888-111111111111');
$toolComponent = new ToolComponentReference();
$toolComponent->setName('CWE');
$toolComponent->setGuid('33333333-0000-1111-8888-000000000000');
$target->setToolComponent($toolComponent);

$relationship = new ReportingDescriptorRelationship();
$relationship->setTarget($target);
$relationship->addKinds(['superset']);
$rule->addRelationships([$relationship]);
$driver->addRules([$rule]);

$tool = new Tool();
$tool->setDriver($driver);

$run = new Run();
$run->setTool($tool);

$log = new SarifLog([$run]);
