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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/resultProvenance.md
$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('SarifSamples')
                            ->version('1.0')
                            ->informationUri('https://github.com/microsoft/sarif-tutorials/')
                    )
            )
            ->addResult(
                $factory->result('Assertions are unreliable.')
                    ->ruleId('Assertions')
                    ->provenance(
                        $factory->resultProvenance()
                            ->addConversionSource(
                                $factory->physicalLocation()
                                    ->artifactLocation(
                                        $factory->artifactLocation()
                                            ->uri('CodeScanner.log')
                                            ->uriBaseId('LOGSROOT')
                                    )
                                    ->region(
                                        $factory->region()
                                            ->startLine(3)
                                            ->startColumn(3)
                                            ->endLine(12)
                                            ->endColumn(13)
                                            ->snippet(
                                                $factory->artifactContent()
                                                    ->text('<problem>...</problem>')
                                            )
                                    )
                            )
                    )
            )
    )
;
