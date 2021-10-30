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
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('AndroidStudio');
$driver->setInformationUri('https://android-studion.dev');
$driver->setSemanticVersion('1.0.0-beta.1');
$tool = new Tool($driver);

$converter = new Tool(new ToolComponent('SARIF SDK Multitool'));

$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('northwind.log');
$artifactLocation->setUriBaseId('$LOG_DIR$');

$invocation = new Invocation(true);
$invocation->setCommandLine('Sarif.Multitool.exe convert -t AndroidStudio northwind.log');

$conversion = new Conversion($converter);
$conversion->addAnalysisToolLogFiles([$artifactLocation]);
$conversion->setInvocation($invocation);

$run = new Run($tool);
$run->setConversion($conversion);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
