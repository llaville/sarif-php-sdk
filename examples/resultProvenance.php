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

$driver = new ToolComponent('SarifSamples');
$driver->setInformationUri('https://github.com/microsoft/sarif-tutorials/');
$driver->setVersion('1.0');

$tool = new Tool($driver);

$provenance = new ResultProvenance();
$fromSources = [];
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('CodeScanner.log');
$artifactLocation->setUriBaseId('LOGSROOT');
$fromSources[0] = new PhysicalLocation($artifactLocation);
$region = new Region(3, 3, 12, 13);
$snippet = new ArtifactContent();
$snippet->setText('<problem>...</problem>');
$region->setSnippet($snippet);
$fromSources[0]->setRegion($region);

$provenance->addConversionSources($fromSources);

$result = new Result(new Message('Assertions are unreliable.'));
$result->setRuleId('Assertions');
$result->setProvenance($provenance);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
