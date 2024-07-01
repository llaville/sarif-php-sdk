<?php
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
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\Region;
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

$tool = new Tool();
$tool->setDriver($driver);

$message = new Message();
$message->setText('Tainted data was used. The data came from [here](3).');

$result = new Result();
$result->setMessage($message);
$result->setRuleId('TNT0001');
$location = new Location();
$location->setId(3);
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('file:///C:/code/input.c');
$physicalLocation = new PhysicalLocation();
$physicalLocation->setArtifactLocation($artifactLocation);
$region = new Region();
$region->setStartLine(25);
$region->setStartColumn(19);
$physicalLocation->setRegion($region);
$location->setPhysicalLocation($physicalLocation);
$result->addRelatedLocations([$location]);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);
