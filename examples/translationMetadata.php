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

$driver = new ToolComponent();
$driver->setName('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');
$driver->setLanguage('fr-FR');

$translationMetadata = new TranslationMetadata();
$translationMetadata->setName('CodeScanner translation for fr-FR');
$translationMetadata->setFullName('CodeScanner translation for fr-FR by Example Corp.');
$desc = new MultiformatMessageString();
$desc->setText('A good translation');
$translationMetadata->setShortDescription($desc);
$desc = new MultiformatMessageString();
$desc->setText('A good translation performed by native en-US speakers.');
$translationMetadata->setFullDescription($desc);
$driver->setTranslationMetadata($translationMetadata);

$driver->setName('(fr-FR translation)');
$driver->setFullName('(fr-FR translation of translated component’s full name)');

$tool = new Tool();
$tool->setDriver($driver);

$run = new Run();
$run->setTool($tool);

$log = new SarifLog([$run]);
