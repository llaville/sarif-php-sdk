<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\Artifact;
use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$tool = new Tool($driver);

$artifact1 = new Artifact();
$artifactLocation1 = new ArtifactLocation();
$artifactLocation1->setUri('file:///C:/Code/app.zip');
$artifact1->setLocation($artifactLocation1);
$artifact1->setMimeType('application/zip');

$artifact2 = new Artifact();
$artifactLocation2 = new ArtifactLocation();
$artifactLocation2->setUri('docs/intro.docx');
$artifact2->setLocation($artifactLocation2);
$artifact2->setMimeType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
$artifact2->setParentIndex(0);

$artifact3 = new Artifact();
$artifact3->setOffset(17522);
$artifact3->setLength(4050);
$artifact3->setMimeType('application/x-contoso-animation');
$artifact3->setParentIndex(1);

$run = new Run($tool);
$run->addArtifacts([$artifact1, $artifact2, $artifact3]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
