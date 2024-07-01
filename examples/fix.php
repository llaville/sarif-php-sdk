<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\ArtifactChange;
use Bartlett\Sarif\Definition\ArtifactContent;
use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Fix;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Replacement;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$tool = new Tool();
$tool->setDriver($driver);

$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('src/a.c');

$replacement = new Replacement();
$region = new Region();
$region->setStartLine(1);
$region->setEndLine(1);
$region->setStartColumn(1);
$replacement->setDeletedRegion($region);
$insertedContent = new ArtifactContent();
$insertedContent->setText('// ');
$replacement->setInsertedContent($insertedContent);

$artifactChange = new ArtifactChange();
$artifactChange->setArtifactLocation($artifactLocation);
$artifactChange->addReplacements([$replacement]);

$fix = new Fix();
$fix->addArtifactChanges([$artifactChange]);

$message = new Message();
$message->setText('...');

$result = new Result();
$result->setMessage($message);
$result->setRuleId('CA1001');
$result->addFixes([$fix]);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);
