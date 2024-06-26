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

$driver = new ToolComponent();
$driver->setName('AndroidStudio');
$driver->setInformationUri('https://android-studion.dev');
$driver->setSemanticVersion('1.0.0-beta.1');

$tool = new Tool();
$tool->setDriver($driver);

$converter = new Tool();
$sdk = new ToolComponent();
$sdk->setName('SARIF SDK Multitool');
$converter->setDriver($sdk);

$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('northwind.log');
$artifactLocation->setUriBaseId('$LOG_DIR$');

$invocation = new Invocation();
$invocation->setExecutionSuccessful(true);
$invocation->setCommandLine('Sarif.Multitool.exe convert -t AndroidStudio northwind.log');

$conversion = new Conversion();
$conversion->setTool($converter);
$conversion->addAnalysisToolLogFiles([$artifactLocation]);
$conversion->setInvocation($invocation);

$run = new Run();
$run->setTool($tool);
$run->setConversion($conversion);

$log = new SarifLog([$run]);
