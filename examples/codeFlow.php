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
use Bartlett\Sarif\Definition\CodeFlow;
use Bartlett\Sarif\Definition\Location;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\ThreadFlow;
use Bartlett\Sarif\Definition\ThreadFlowLocation;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$tool = new Tool();
$tool->setDriver($driver);

$threadFlowLocation = new ThreadFlowLocation();
$location = new Location();
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('ui/window.c');
$artifactLocation->setUriBaseId('SRCROOT');
$physicalLocation = new PhysicalLocation();
$physicalLocation->setArtifactLocation($artifactLocation);
$region = new Region();
$region->setStartLine(42);
$physicalLocation->setRegion($region);
$location->setPhysicalLocation($physicalLocation);
$threadFlowLocation->setLocation($location);

$x = new MultiformatMessageString();
$x->setText('42');

$y = new MultiformatMessageString();
$y->setText('54');

$xy = new MultiformatMessageString();
$xy->setText('96');

$threadFlowLocation->addAdditionalProperties([
    'x' => $x,
    'y' => $y,
    'x+y' => $xy,
]);
$threadFlowLocation->setNestingLevel(0);
$threadFlowLocation->setExecutionOrder(2);

$message = new Message();
$message->setText('A threadFlow object');

$threadFlow = new ThreadFlow();
$threadFlow->setId('thread-123');
$threadFlow->setMessage($message);
$threadFlow->addLocations([$threadFlowLocation]);

$message = new Message();
$message->setText('A codeFlow object');

$codeFlow = new CodeFlow();
$codeFlow->setMessage($message);
$codeFlow->addThreadFlows([$threadFlow]);

$message = new Message();
$message->setText('A result object');

$result = new Result();
$result->setMessage($message);
$result->addCodeFlows([$codeFlow]);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);
