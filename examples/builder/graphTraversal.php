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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/graphTraversal.md
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
                $factory->result('A graph and edge traversal objects')
                    ->addGraph(
                        $factory->graph()
                            ->addNode(
                                $factory->node()
                                    ->id('n1')
                            )
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
                            ->addEdge(
                                $factory->edge()
                                    ->id('e1')
                                    ->sourceNodeId('n1')
                                    ->targetNodeId('n2')
                            )
                            ->addEdge(
                                $factory->edge()
                                    ->id('e2')
                                    ->sourceNodeId('n2')
                                    ->targetNodeId('n3')
                            )
                            ->addEdge(
                                $factory->edge()
                                    ->id('e3')
                                    ->sourceNodeId('n2')
                                    ->targetNodeId('n4')
                            )
                    )
                    ->addGraphTraversal(
                        $factory->graphTraversal()
                            ->resultGraphIndex(0)
                            ->addInitialState('x', '1')
                            ->addInitialState('y', '2')
                            ->addInitialState('x+y', '3')
                            ->addEdgeTraversal(
                                $factory->edgeTraversal()
                                    ->edgeId('e1')
                                    ->addFinalState('x', '4')
                                    ->addFinalState('y', '2')
                                    ->addFinalState('x+y', '6')
                            )
                            ->addEdgeTraversal(
                                $factory->edgeTraversal()
                                    ->edgeId('e3')
                                    ->addFinalState('x', '4')
                                    ->addFinalState('y', '7')
                                    ->addFinalState('x+y', '11')
                            )
                    )
            )
    )
;
