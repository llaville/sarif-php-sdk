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
            ->addResult(
                $factory->result('...')
                    ->ruleId('CA1001')
                    ->addFix(
                        $factory->fix()
                            ->addArtifactChange(
                                $factory->artifactChange()
                                    ->artifactLocation(
                                        $factory->artifactLocation()
                                            ->uri('src/a.c')
                                    )
                                    ->addReplacement(
                                        $factory->replacement()
                                            ->deletedRegion(
                                                $factory->region()
                                                    ->startLine(1)
                                                    ->startColumn(1)
                                                    ->endLine(1)
                                            )
                                            ->insertedContent(
                                                $factory->artifactContent()
                                                    ->text('// ')
                                            )
                                    )
                            )
                    )
            )
    )
;
