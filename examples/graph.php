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
use Bartlett\Sarif\Definition\Graph;
use Bartlett\Sarif\Definition\Message;
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
$driver->setFullName('CodeScanner 1.1, Developer Preview (en-US)');
$driver->setSemanticVersion('1.1.2-beta.12');
$driver->setVersion('1.1.2b12');

$tool = new Tool();
$tool->setDriver($driver);

$nodes = [];
foreach ([2 => 'n2', 3 => 'n3', 4 => 'n4', 1 => 'n1'] as $idx => $nodeId) {
    $node = new Node();
    $node->setId($nodeId);
    $nodes[$idx] = $node;
}
$nodes[1]->addChildren([$nodes[3]]);

$edges = [];
$edges[1] = new Edge();
$edges[1]->setId('e1');
$edges[1]->setSourceNodeId('n3');
$edges[1]->setTargetNodeId('n4');

$graph = new Graph();
$graph->addNodes($nodes);
$graph->addEdges($edges);

$message = new Message();
$message->setText('Have a look on this graph');

$result = new Result();
$result->setMessage($message);
$result->addGraphs([$graph]);

$run = new Run();
$run->setTool($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);
