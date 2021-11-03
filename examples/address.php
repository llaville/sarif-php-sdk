<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\Address;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

$address1 = new Address();
$address1->setName('Multitool.exe');
$address1->setKind('module');
$address1->setAbsoluteAddress(1024);

$address2 = new Address();
$address2->setName('Sections');
$address2->setKind('header');
$address2->setParentIndex(0);
$address2->setOffsetFromParent(376);
$address2->setAbsoluteAddress(1400);
$address2->setRelativeAddress(376);

$address3 = new Address();
$address3->setName('.text');
$address3->setKind('section');
$address3->setParentIndex(1);
$address3->setOffsetFromParent(136);
$address3->setAbsoluteAddress(1536);
$address3->setRelativeAddress(512);

$run = new Run($tool);
$run->addAddresses([$address1, $address2, $address3]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
