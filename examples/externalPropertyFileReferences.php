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
use Bartlett\Sarif\Definition\ExternalPropertyFileReference;
use Bartlett\Sarif\Definition\ExternalPropertyFileReferences;
use Bartlett\Sarif\Definition\Run;
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

$run = new Run();
$run->setTool($tool);
$logsDir = new ArtifactLocation();
$logsDir->setUri('file:///C:/logs/');
$run->addAdditionalProperties([
    'LOGSDIR' => $logsDir,
]);

$location = new ArtifactLocation();
$location->setUri('scantool.conversion.sarif-external-properties');
$location->setUriBaseId('LOGSDIR');
$conversion = new ExternalPropertyFileReference();
$conversion->setLocation($location);
$conversion->setGuid('11111111-1111-1111-8888-111111111111');

$location = new ArtifactLocation();
$location->setUri('scantool.results-1.sarif-external-properties');
$location->setUriBaseId('LOGSDIR');
$resultRef1 = new ExternalPropertyFileReference();
$resultRef1->setLocation($location);
$resultRef1->setGuid('22222222-2222-1111-8888-222222222222');
$resultRef1->setItemCount(1000);

$location = new ArtifactLocation();
$location->setUri('scantool.results-2.sarif-external-properties');
$location->setUriBaseId('LOGSDIR');
$resultRef2 = new ExternalPropertyFileReference();
$resultRef2->setLocation($location);
$resultRef2->setGuid('33333333-3333-1111-8888-333333333333');
$resultRef2->setItemCount(4277);

$externalPropertyFileReferences = new ExternalPropertyFileReferences();
$externalPropertyFileReferences->setConversion($conversion);
$externalPropertyFileReferences->addResults([$resultRef1, $resultRef2]);
$run->setExternalPropertyFileReferences($externalPropertyFileReferences);

$log = new SarifLog([$run]);
