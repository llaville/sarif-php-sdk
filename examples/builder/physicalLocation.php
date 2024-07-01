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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/physicalLocation.md
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
                            ->text('Identify a physical location where a result was detected.')
                    )
                    ->addLocation(
                        $factory->location()
                            ->physicalLocation(
                                $factory->physicalLocation()
                                    ->artifactLocation(
                                        $factory->artifactLocation()
                                            ->uri('ui/window.c')
                                            ->uriBaseId('SRCROOT')
                                    )
                                    ->region(
                                        $factory->region()
                                            ->startLine(42)
                                    )
                            )
                    )
            )
    )
;
