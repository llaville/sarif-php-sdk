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
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Suppression;
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

$suppression = new Suppression();
$suppression->setKind('inSource');
$suppression->setGuid('11111111-1111-1111-8888-111111111111');
$suppression->setStatus('underReview');
$suppression->setJustification('result outdated');

$message = new Message();
$message->setText('Request to suppress a result');

$result = new Result();
$result->setMessage($message);
$result->addSuppressions([$suppression]);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);
