<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setFullName('CodeScanner 1.1, Developer Preview (en-US)');
$driver->setSemanticVersion('1.1.2-beta.12');
$driver->setVersion('1.1.2b12');

$extension = new ToolComponent('CodeScanner Security Rules');
$extension->setVersion('3.1');

$tool = new Tool($driver);
$tool->addExtensions([$extension]);

$run = new Run($tool);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
