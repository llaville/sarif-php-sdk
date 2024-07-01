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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/locationRelationship.md
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
                $factory->result()
                    ->message(
                        $factory->message()
                            ->text('A result object with locationRelationship object')
                    )
                    ->addLocation(
                        $factory->location()
                            ->id(0)
                            ->physicalLocation(
                                $factory->physicalLocation()
                                    ->artifactLocation(
                                        $factory->artifactLocation()
                                            ->uri('f.h')
                                    )
                                    ->region(
                                        $factory->region()
                                            ->startLine(42)
                                    )
                            )
                            ->addRelationship(
                                $factory->locationRelationship()
                                    ->target(1)
                                    ->addKind('isIncludedBy')
                            )
                    )
                    ->addRelatedLocation(
                        $factory->location()
                            ->id(1)
                            ->physicalLocation(
                                $factory->physicalLocation()
                                    ->artifactLocation(
                                        $factory->artifactLocation()
                                            ->uri('g.h')
                                    )
                                    ->region(
                                        $factory->region()
                                            ->startLine(17)
                                    )
                            )
                            ->addRelationship(
                                $factory->locationRelationship()
                                    ->target(0)
                                    ->addKind('includes')
                            )
                            ->addRelationship(
                                $factory->locationRelationship()
                                    ->target(2)
                                    ->addKind('isIncludedBy')
                            )
                    )
                    ->addRelatedLocation(
                        $factory->location()
                            ->id(2)
                            ->physicalLocation(
                                $factory->physicalLocation()
                                    ->artifactLocation(
                                        $factory->artifactLocation()
                                            ->uri('g.c')
                                    )
                                    ->region(
                                        $factory->region()
                                            ->startLine(8)
                                    )
                            )
                            ->addRelationship(
                                $factory->locationRelationship()
                                    ->target(1)
                                    ->addKind('includes')
                            )
                    )
            )
    )
;
