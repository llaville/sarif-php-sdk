<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Definition\TranslationMetadata;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$driver->setLanguage('fr-FR');

$translationMetadata = new TranslationMetadata('CodeScanner translation for fr-FR');
$translationMetadata->setFullName('CodeScanner translation for fr-FR by Example Corp.');
$translationMetadata->setShortDescription(
    new MultiformatMessageString('A good translation')
);
$translationMetadata->setFullDescription(
    new MultiformatMessageString('A good translation performed by native en-US speakers.')
);
$driver->setTranslationMetadata($translationMetadata);

$driver->setName('(fr-FR translation)');
$driver->setFullName('(fr-FR translation of translated component’s full name)');

$tool = new Tool($driver);

$run = new Run($tool);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
