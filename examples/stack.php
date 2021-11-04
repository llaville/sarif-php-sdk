<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Location;
use Bartlett\Sarif\Definition\LogicalLocation;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Stack;
use Bartlett\Sarif\Definition\StackFrame;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('SarifSamples');
$driver->setInformationUri('https://github.com/microsoft/sarif-tutorials/');
$driver->setVersion('1.0');

$tool = new Tool($driver);

$frame = new StackFrame();

$location = new Location();
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('collections/list.h');
$artifactLocation->setUriBaseId('SRCROOT');
$physicalLocation = new PhysicalLocation($artifactLocation);
$physicalLocation->setRegion(new Region(110, 15));
$location->setPhysicalLocation($physicalLocation);
$logicalLocation = new LogicalLocation();
$logicalLocation->setFullyQualifiedName('collections::list::add_core');
$location->addLogicalLocations([$logicalLocation]);
$frame->setLocation($location);
$frame->setModule('platform');
$frame->setThreadId(52);
$frame->addParameters(['null', '0', '14']);

$stack = new Stack([$frame]);
$stack->setMessage(new Message('Call stack resulting from usage of uninitialized variable.'));

$result = new Result(new Message('Uninitialized variable.'));
$result->addStacks([$stack]);
$result->setRuleId('TUT1001');

$location = new Location();
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('collections/list.h');
$artifactLocation->setUriBaseId('SRCROOT');
$physicalLocation = new PhysicalLocation($artifactLocation);
$physicalLocation->setRegion(new Region(15));
$location->setPhysicalLocation($physicalLocation);
$logicalLocation = new LogicalLocation();
$logicalLocation->setFullyQualifiedName('collections::list::add');
$location->addLogicalLocations([$logicalLocation]);
$result->addLocations([$location]);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
