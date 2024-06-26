<!-- markdownlint-disable MD013 -->
# graphTraversal object

A `graphTraversal` object represents a "graph traversal", that is, a path through
a graph specified by a sequence of connected "edge traversals", each of which is represented by an `edgeTraversal` object.

![graphTraversal object](../assets/images/reference-graph-traversal.graphviz.svg)

## Example

```json
{
    "$schema": "https://json.schemastore.org/sarif-2.1.0.json",
    "version": "2.1.0",
    "runs": [
        {
            "tool": {
                "driver": {
                    "name": "CodeScanner",
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https://codeScanner.dev"
                }
            },
            "results": [
                {
                    "message": {
                        "text": "A graph and edge traversal objects"
                    },
                    "graphs": [
                        {
                            "nodes": [
                                {
                                    "id": "n1"
                                },
                                {
                                    "id": "n2"
                                },
                                {
                                    "id": "n3"
                                },
                                {
                                    "id": "n4"
                                }
                            ],
                            "edges": [
                                {
                                    "id": "e1",
                                    "sourceNodeId": "n1",
                                    "targetNodeId": "n2"
                                },
                                {
                                    "id": "e2",
                                    "sourceNodeId": "n2",
                                    "targetNodeId": "n3"
                                },
                                {
                                    "id": "e3",
                                    "sourceNodeId": "n2",
                                    "targetNodeId": "n4"
                                }
                            ]
                        }
                    ],
                    "graphTraversals": [
                        {
                            "resultGraphIndex": 0,
                            "initialState": {
                                "x": {
                                    "text": "1"
                                },
                                "y": {
                                    "text": "2"
                                },
                                "x+y": {
                                    "text": "3"
                                }
                            },
                            "edgeTraversals": [
                                {
                                    "edgeId": "e1",
                                    "finalState": {
                                        "x": {
                                            "text": "4"
                                        },
                                        "y": {
                                            "text": "2"
                                        },
                                        "x+y": {
                                            "text": "6"
                                        }
                                    }
                                },
                                {
                                    "edgeId": "e3",
                                    "finalState": {
                                        "x": {
                                            "text": "4"
                                        },
                                        "y": {
                                            "text": "7"
                                        },
                                        "x+y": {
                                            "text": "11"
                                        }
                                    }
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]
}
```

## How to generate

See full [`examples/graphTraversal.php`][example-script] script into repository.

> [!NOTE]
> Since release 1.5.0, you may use fluent builders API as alternative.
> See full [`examples/builder/graphTraversal.php`][example-builder] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/graphTraversal.php
[example-builder]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/builder/graphTraversal.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\Edge;
use Bartlett\Sarif\Definition\EdgeTraversal;
use Bartlett\Sarif\Definition\Graph;
use Bartlett\Sarif\Definition\GraphTraversal;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\Node;
use Bartlett\Sarif\Definition\Result;

$nodes = [];
$nodes[1] = new Node('n1');
$nodes[2] = new Node('n2');
$nodes[3] = new Node('n3');
$nodes[4] = new Node('n4');

$edges = [];
$edges[1] = new Edge('e1', 'n1', 'n2');
$edges[2] = new Edge('e2', 'n2', 'n3');
$edges[3] = new Edge('e3', 'n2', 'n4');

$graph = new Graph();
$graph->addNodes($nodes);
$graph->addEdges($edges);

$graphTraversal = new GraphTraversal(null, 0);
$graphTraversal->addAdditionalPropertiesInitialState([
    'x' => new MultiformatMessageString('1'),
    'y' => new MultiformatMessageString('2'),
    'x+y' => new MultiformatMessageString('3'),
]);

$edgeTraversal1 = new EdgeTraversal('e1');
$edgeTraversal1->addAdditionalProperties([
    'x' => new MultiformatMessageString('4'),
    'y' => new MultiformatMessageString('2'),
    'x+y' => new MultiformatMessageString('6'),
]);
$edgeTraversal3 = new EdgeTraversal('e3');
$edgeTraversal3->addAdditionalProperties([
    'x' => new MultiformatMessageString('4'),
    'y' => new MultiformatMessageString('7'),
    'x+y' => new MultiformatMessageString('11'),
]);
$graphTraversal->addEdgeTraversals([$edgeTraversal1, $edgeTraversal3]);

$result = new Result(new Message('A graph and edge traversal objects'));
$result->addGraphs([$graph]);
$result->addGraphTraversals([$graphTraversal]);

```
