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
use Bartlett\Sarif\Definition\Conversion;
use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Definition\VersionControlDetails;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('AndroidStudio');
$driver->setInformationUri('https://android-studion.dev');
$driver->setSemanticVersion('1.0.0-beta.1');
$tool = new Tool($driver);

$package = new VersionControlDetails('https://github.com/example-corp/package');
$package->setRevisionId('b87c4e9');
$packageMappedTo = new ArtifactLocation();
$packageMappedTo->setUriBaseId('PACKAGE_ROOT');
$package->setMappedTo($packageMappedTo);

$plugin1 = new VersionControlDetails('https://github.com/example-corp/plugin1');
$plugin1->setRevisionId('cafdac7');
$plugin1MappedTo = new ArtifactLocation();
$plugin1MappedTo->setUriBaseId('PACKAGE_ROOT');
$plugin1MappedTo->setUri('plugin1');
$plugin1->setMappedTo($plugin1MappedTo);

$plugin2 = new VersionControlDetails('https://github.com/example-corp/plugin2');
$plugin2->setRevisionId('d0dc2c0');
$plugin2MappedTo = new ArtifactLocation();
$plugin2MappedTo->setUriBaseId('PACKAGE_ROOT');
$plugin2MappedTo->setUri('plugin2');
$plugin2->setMappedTo($plugin2MappedTo);

$run = new Run($tool);
$run->addVersionControlDetails([$package, $plugin1, $plugin2]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
