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
use Bartlett\Sarif\Definition\Attachment;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setFullName('CodeScanner 1.1, Developer Preview (en-US)');
$driver->setSemanticVersion('1.1.2-beta.12');
$driver->setVersion('1.1.2b12');

$tool = new Tool();
$tool->setDriver($driver);

$desc = new Message();
$desc->setText('Screen shot');

$attachment = new Attachment();
$attachment->setDescription($desc);
$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('file:///C:/ScanOutput/image001.png');
$attachment->setArtifactLocation($artifactLocation);

$message = new Message();
$message->setText('Have a look on screen shot provided');

$result = new Result();
$result->setMessage($message);
$result->addAttachments([$attachment]);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);
