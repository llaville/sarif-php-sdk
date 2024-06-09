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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/graph.md
$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('CodeScanner')
                            ->fullName('CodeScanner 1.1, Developer Preview (en-US)')
                            ->version('1.1.2b12')
                            ->semanticVersion('1.1.2-beta.12')
                            ->informationUri('https://codeScanner.dev')
                    )
            )
            ->addResult(
                $factory->result('Have a look on this graph')
                    ->addGraph(
                        $factory->graph()
                            ->addNode(
                                $factory->node()
                                    ->id('n2')
                            )
                            ->addNode(
                                $factory->node()
                                    ->id('n3')
                            )
                            ->addNode(
                                $factory->node()
                                    ->id('n4')
                            )
                            ->addNode(
                                $factory->node()
                                    ->id('n1')
                                    ->addChildren(
                                        $factory->node()
                                            ->id('n3')
                                    )
                            )
                            ->addEdge(
                                $factory->edge()
                                    ->id('e1')
                                    ->sourceNodeId('n3')
                                    ->targetNodeId('n4')
                            )
                    )
            )
    )
;
