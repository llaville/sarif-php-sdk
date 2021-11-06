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

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule = new ReportingDescriptor('CA1000');

$target = new ReportingDescriptorReference(0, '327', '33333333-0000-1111-8888-111111111111');
$toolComponent = new ToolComponentReference();
$toolComponent->setName('CWE');
$toolComponent->setGuid('33333333-0000-1111-8888-000000000000');
$target->setToolComponent($toolComponent);

$relationship = new ReportingDescriptorRelationship($target);
$relationship->addKinds(['superset']);
$rule->addRelationships([$relationship]);
$driver->addRules([$rule]);

$tool = new Tool($driver);

$run = new Run($tool);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
