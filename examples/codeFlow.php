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

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

$threadFlowLocation = new ThreadFlowLocation();
$location = new Location();
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('ui/window.c');
$artifactLocation->setUriBaseId('SRCROOT');
$physicalLocation = new PhysicalLocation($artifactLocation);
$physicalLocation->setRegion(new Region(42));
$location->setPhysicalLocation($physicalLocation);
$threadFlowLocation->setLocation($location);
$threadFlowLocation->addAdditionalProperties([
    'x' => new MultiformatMessageString('42'),
    'y' => new MultiformatMessageString('54'),
    'x+y' => new MultiformatMessageString('96'),
]);
$threadFlowLocation->setNestingLevel(0);
$threadFlowLocation->setExecutionOrder(2);

$threadFlow = new ThreadFlow([$threadFlowLocation]);
$threadFlow->setId('thread-123');
$threadFlow->setMessage(new Message('A threadFlow object'));

$codeFlow = new CodeFlow([$threadFlow]);
$codeFlow->setMessage(new Message('A codeFlow object'));

$result = new Result(new Message('A result object'));
$result->addCodeFlows([$codeFlow]);

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
