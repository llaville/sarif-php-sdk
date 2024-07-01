<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\Edge;
use Bartlett\Sarif\Definition\EdgeTraversal;
use Bartlett\Sarif\Definition\Graph;
use Bartlett\Sarif\Definition\GraphTraversal;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\Node;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent();
$driver->setName('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$tool = new Tool();
$tool->setDriver($driver);

$nodes = [];
foreach ([1 => 'n1', 2 => 'n2', 3 => 'n3', 4 => 'n4'] as $idx => $nodeId) {
    $node = new Node();
    $node->setId($nodeId);
    $nodes[$idx] = $node;
}

$edges = [];

$edges[1] = new Edge();
$edges[1]->setId('e1');
$edges[1]->setSourceNodeId('n1');
$edges[1]->setTargetNodeId('n2');

$edges[2] = new Edge();
$edges[2]->setId('e2');
$edges[2]->setSourceNodeId('n2');
$edges[2]->setTargetNodeId('n3');

$edges[3] = new Edge();
$edges[3]->setId('e3');
$edges[3]->setSourceNodeId('n2');
$edges[3]->setTargetNodeId('n4');

$graph = new Graph();
$graph->addNodes($nodes);
$graph->addEdges($edges);

$graphTraversal = new GraphTraversal();
$graphTraversal->setResultGraphIndex(0);

$x = new MultiformatMessageString();
$x->setText('1');

$y = new MultiformatMessageString();
$y->setText('2');

$xy = new MultiformatMessageString();
$xy->setText('3');

$graphTraversal->addAdditionalPropertiesInitialState([
    'x' => $x,
    'y' => $y,
    'x+y' => $xy,
]);

$edgeTraversal1 = new EdgeTraversal();
$edgeTraversal1->setEdgeId('e1');

$x = new MultiformatMessageString();
$x->setText('4');

$y = new MultiformatMessageString();
$y->setText('2');

$xy = new MultiformatMessageString();
$xy->setText('6');

$edgeTraversal1->addAdditionalProperties([
    'x' => $x,
    'y' => $y,
    'x+y' => $xy,
]);
$edgeTraversal3 = new EdgeTraversal();
$edgeTraversal3->setEdgeId('e3');

$x = new MultiformatMessageString();
$x->setText('4');

$y = new MultiformatMessageString();
$y->setText('7');

$xy = new MultiformatMessageString();
$xy->setText('11');

$edgeTraversal3->addAdditionalProperties([
    'x' => $x,
    'y' => $y,
    'x+y' => $xy,
]);
$graphTraversal->addEdgeTraversals([$edgeTraversal1, $edgeTraversal3]);

$message = new Message();
$message->setText('A graph and edge traversal objects');

$result = new Result();
$result->setMessage($message);
$result->addGraphs([$graph]);
$result->addGraphTraversals([$graphTraversal]);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);
