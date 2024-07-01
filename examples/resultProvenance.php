<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\ArtifactContent;
use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\ResultProvenance;
use Bartlett\Sarif\Definition\Run;
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

$provenance = new ResultProvenance();
$fromSources = [];
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('CodeScanner.log');
$artifactLocation->setUriBaseId('LOGSROOT');
$fromSources[0] = new PhysicalLocation();
$fromSources[0]->setArtifactLocation($artifactLocation);
$region = new Region();
$region->setStartLine(3);
$region->setEndLine(12);
$region->setStartColumn(3);
$region->setEndColumn(13);
$snippet = new ArtifactContent();
$snippet->setText('<problem>...</problem>');
$region->setSnippet($snippet);
$fromSources[0]->setRegion($region);

$provenance->addConversionSources($fromSources);

$message = new Message();
$message->setText('Assertions are unreliable.');

$result = new Result();
$result->setMessage($message);
$result->setRuleId('Assertions');
$result->setProvenance($provenance);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);
