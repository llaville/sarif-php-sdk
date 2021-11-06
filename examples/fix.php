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

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$tool = new Tool($driver);

$artifactLocation = new ArtifactLocation();
$artifactLocation->setUri('src/a.c');
$replacement = new Replacement(new Region(1, 1, 1));
$insertedContent = new ArtifactContent();
$insertedContent->setText('// ');
$replacement->setInsertedContent($insertedContent);
$artifactChange = new ArtifactChange($artifactLocation, [$replacement]);

$fix = new Fix([$artifactChange]);

$result = new Result(new Message('...'));
$result->setRuleId('CA1001');
$result->addFixes([$fix]);

$run = new Run($tool);
$run->addResults([$result]);


$log = new SarifLog([$run]);


try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
