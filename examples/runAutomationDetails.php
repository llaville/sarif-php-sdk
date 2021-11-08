<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\RunAutomationDetails;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setFullName('CodeScanner 1.1, Developer Preview (en-US)');
$driver->setSemanticVersion('1.1.2-beta.12');
$driver->setVersion('1.1.2b12');

$tool = new Tool($driver);

$automationDetails = new RunAutomationDetails();

$text = "This is the {0} nightly run of the Credential Scanner tool on" .
    " all product binaries in the '{1}' branch of the '{2}' repo." .
    " The scanned binaries are architecture '{3}' and build type '{4}'.";
$description = new Message($text);
$description->addArguments([
    "October 10, 2018",
    "master",
    "sarif-sdk",
    "x86",
    "debug",
]);
$automationDetails->setDescription($description);
$automationDetails->setId('Nightly CredScan run for sarif-sdk/master/x86/debug/2018-10-05');
$automationDetails->setGuid('11111111-1111-1111-8888-111111111111');
$automationDetails->setCorrelationGuid('22222222-2222-1111-8888-222222222222');

$run = new Run($tool);
$run->setAutomationDetails($automationDetails);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
