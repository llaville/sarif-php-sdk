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

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$tool = new Tool($driver);

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

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
