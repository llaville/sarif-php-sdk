<!-- markdownlint-disable MD013 -->
# edge object

A `edge` object represents a directed edge in the graph represented by theGraph.

![edge object](../assets/images/reference-edge.graphviz.svg)

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
                    "fullName": "CodeScanner 1.1, Developer Preview (en-US)",
                    "version": "1.1.2b12",
                    "semanticVersion": "1.1.2-beta.12",
                    "informationUri": "https://codeScanner.dev"
                }
            },
            "results": [
                {
                    "message": {
                        "text": "Have a look on this graph"
                    },
                    "graphs": [
                        {
                            "nodes": [
                                {
                                    "id": "n2"
                                },
                                {
                                    "id": "n3"
                                },
                                {
                                    "id": "n4"
                                },
                                {
                                    "id": "n1",
                                    "children": [
                                        {
                                            "id": "n3"
                                        }
                                    ]
                                }
                            ],
                            "edges": [
                                {
                                    "id": "e1",
                                    "sourceNodeId": "n3",
                                    "targetNodeId": "n4"
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

See full [`examples/graph.php`][example-script] script into repository.

[example-script]: https://github.com/llaville/sarif-php-sdk/blob/master/examples/graph.php

```php
<?php declare(strict_types=1);

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Attachment;
use Bartlett\Sarif\Definition\Edge;
use Bartlett\Sarif\Definition\Graph;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\Node;
use Bartlett\Sarif\Definition\Rectangle;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

$nodes = [];
$nodes[2] = new Node('n2');
$nodes[3] = new Node('n3');
$nodes[4] = new Node('n4');
$nodes[1] = new Node('n1');
$nodes[1]->addChildren([$nodes[3]]);

$edges = [];
$edges[1] = new Edge('e1', 'n3', 'n4');

$graph = new Graph();
$graph->addNodes($nodes);
$graph->addEdges($edges);

$result = new Result(new Message('Have a look on this graph'));
$result->addGraphs([$graph]);

```
