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

$driver = new ToolComponent();
$driver->setName('SarifSamples');
$driver->setInformationUri('https://github.com/microsoft/sarif-tutorials/');
$driver->setVersion('1.0');

$tool = new Tool();
$tool->setDriver($driver);

$frame = new StackFrame();

$location = new Location();
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('collections/list.h');
$artifactLocation->setUriBaseId('SRCROOT');
$physicalLocation = new PhysicalLocation();
$physicalLocation->setArtifactLocation($artifactLocation);
$region = new Region();
$region->setStartLine(110);
$region->setStartColumn(15);
$physicalLocation->setRegion($region);
$location->setPhysicalLocation($physicalLocation);
$logicalLocation = new LogicalLocation();
$logicalLocation->setFullyQualifiedName('collections::list::add_core');
$location->addLogicalLocations([$logicalLocation]);

$frame->setLocation($location);
$frame->setModule('platform');
$frame->setThreadId(52);
$frame->addParameters(['null', '0', '14']);

$message = new Message();
$message->setText('Call stack resulting from usage of uninitialized variable.');

$stack = new Stack();
$stack->setMessage($message);
$stack->addFrames([$frame]);

$message = new Message();
$message->setText('Uninitialized variable.');

$result = new Result();
$result->setMessage($message);
$result->addStacks([$stack]);
$result->setRuleId('TUT1001');

$location = new Location();
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('collections/list.h');
$artifactLocation->setUriBaseId('SRCROOT');
$physicalLocation = new PhysicalLocation();
$physicalLocation->setArtifactLocation($artifactLocation);
$region = new Region();
$region->setStartLine(15);
$physicalLocation->setRegion($region);
$location->setPhysicalLocation($physicalLocation);
$logicalLocation = new LogicalLocation();
$logicalLocation->setFullyQualifiedName('collections::list::add');
$location->addLogicalLocations([$logicalLocation]);
$result->addLocations([$location]);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);
