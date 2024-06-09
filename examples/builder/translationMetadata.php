<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Bartlett\Sarif\Factory\BuilderFactory;

$factory = new BuilderFactory();

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/translationMetadata.md
$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('(fr-FR translation)')
                            ->fullName('(fr-FR translation of translated component’s full name)')
                            ->semanticVersion('1.1.2-beta.12')
                            ->informationUri('https://codeScanner.dev')
                            ->language('fr-FR')
                            ->translationMetadata(
                                $factory->translationMetadata()
                                    ->name('CodeScanner translation for fr-FR')
                                    ->fullName('CodeScanner translation for fr-FR by Example Corp.')
                                    ->shortDescription('A good translation')
                                    ->fullDescription('A good translation performed by native en-US speakers.')
                            )
                    )
            )
    )
;
