<?php
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Bartlett\Sarif\Factory\BuilderFactory;

$factory = new BuilderFactory();

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/message.md
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
                $factory->result('Tainted data was used. The data came from [here](3).')
                    ->ruleId('TNT0001')
                    ->addRelatedLocation(
                        $factory->location()
                            ->id(3)
                            ->physicalLocation(
                                $factory->physicalLocation()
                                    ->artifactLocation(
                                        $factory->artifactLocation()
                                            ->uri('file:///C:/code/input.c')
                                    )
                                    ->region(
                                        $factory->region()
                                            ->startLine(25)
                                            ->startColumn(19)
                                    )
                            )
                    )
            )
    )
;
