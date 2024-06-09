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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/result.md
$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('CodeScanner')
                            ->semanticVersion('1.1.2-beta.12')
                            ->informationUri('https://codeScanner.dev')
                    )
            )
            ->addOriginalUriBaseId(
                'LOGSDIR',
                $factory->artifactLocation()
                    ->uri('file:///C:/logs/')
            )
            ->externalPropertyFileReferences(
                $factory->externalPropertyFileReferences()
                    ->conversion(
                        $factory->externalPropertyFileReference()
                            ->location(
                                $factory->artifactLocation()
                                    ->uri('scantool.conversion.sarif-external-properties')
                                    ->uriBaseId('LOGSDIR')
                            )
                            ->guid('11111111-1111-1111-8888-111111111111')
                    )
                    ->addResult(
                        $factory->externalPropertyFileReference()
                            ->location(
                                $factory->artifactLocation()
                                    ->uri('scantool.results-1.sarif-external-properties')
                                    ->uriBaseId('LOGSDIR')
                            )
                            ->guid('22222222-2222-1111-8888-222222222222')
                            ->itemCount(1000)
                    )
                    ->addResult(
                        $factory->externalPropertyFileReference()
                            ->location(
                                $factory->artifactLocation()
                                    ->uri('scantool.results-2.sarif-external-properties')
                                    ->uriBaseId('LOGSDIR')
                            )
                            ->guid('33333333-3333-1111-8888-333333333333')
                            ->itemCount(4277)
                    )
            )
    )
;
