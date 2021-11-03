<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\LogicalLocation;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('Psalm');
$driver->setInformationUri('https://psalm.de');
$driver->setVersion('4.x-dev');
$tool = new Tool($driver);

$nsLocation = new LogicalLocation();
$nsLocation->setName('Hook');
$nsLocation->setFullyQualifiedName('Psalm\Plugin\Hook');
$nsLocation->setKind('namespace');

$funcLocation = new LogicalLocation();
$funcLocation->setName('afterAnalysis');
$funcLocation->setFullyQualifiedName('Psalm\Plugin\Hook\AfterAnalysisInterface\afterAnalysis');
$funcLocation->setKind('function');

$run = new Run($tool);
$run->addLogicalLocations([$nsLocation, $funcLocation]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
