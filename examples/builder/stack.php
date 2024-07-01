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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/stack.md
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
                $factory->result()
                    ->message(
                        $factory->message()
                            ->text('Uninitialized variable.')
                    )
                    ->ruleId('TUT1001')
                    ->addLocation(
                        $factory->location()
                            ->physicalLocation(
                                $factory->physicalLocation()
                                    ->artifactLocation(
                                        $factory->artifactLocation()
                                            ->uri('collections/list.h')
                                            ->uriBaseId('SRCROOT')
                                    )
                                    ->region(
                                        $factory->region()
                                            ->startLine(15)
                                    )
                            )
                            ->addLogicalLocation(
                                $factory->logicalLocation()
                                    ->fullyQualifiedName('collections::list::add')
                            )
                    )
                    ->addStack(
                        $factory->stack()
                            ->addFrame(
                                $factory->stackFrame()
                                    ->location(
                                        $factory->location()
                                            ->physicalLocation(
                                                $factory->physicalLocation()
                                                    ->artifactLocation(
                                                        $factory->artifactLocation()
                                                            ->uri('collections/list.h')
                                                            ->uriBaseId('SRCROOT')
                                                    )
                                                    ->region(
                                                        $factory->region()
                                                            ->startLine(110)
                                                            ->startColumn(15)
                                                    )
                                            )
                                            ->addLogicalLocation(
                                                $factory->logicalLocation()
                                                    ->fullyQualifiedName('collections::list::add_core')
                                            )
                                    )
                                    ->module('platform')
                                    ->threadId(52)
                                    ->addParameter('null')
                                    ->addParameter('0')
                                    ->addParameter('14')
                            )
                            ->message('Call stack resulting from usage of uninitialized variable.')
                    )
            )
    )
;
