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
use Bartlett\Sarif\Definition\ExternalProperties;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

$apple = new Artifact();
$location = new ArtifactLocation();
$location->setUri('apple.png');
$apple->setLocation($location);
$apple->setMimeType('image/png');

$banana = new Artifact();
$location = new ArtifactLocation();
$location->setUri('banana.png');
$banana->setLocation($location);
$banana->setMimeType('image/png');

$propertyBag = new PropertyBag();
$propertyBag->addProperty('team', 'Security Assurance Team');

$run = new Run($tool);

$log = new SarifLog([$run]);
$externalProperties = new ExternalProperties();
$externalProperties->setGuid('00001111-2222-1111-8888-555566667777');
$externalProperties->setRunGuid('88889999-AAAA-1111-8888-DDDDEEEEFFFF');
$externalProperties->addArtifacts([$apple, $banana]);
$externalProperties->setExternalizedProperties($propertyBag);
$log->addInlineExternalProperties([$externalProperties]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
