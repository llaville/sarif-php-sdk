<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('Psalm');
$driver->setInformationUri('https://psalm.de');
$driver->setVersion('4.x-dev');

$tool = new Tool();
$tool->setDriver($driver);

$propertyBag = new PropertyBag();
$propertyBag->addProperty('stableId', 'Nightly static analysis run');

$run = new Run();
$run->setTool($tool);
$run->setProperties($propertyBag);

$log = new SarifLog([$run]);
