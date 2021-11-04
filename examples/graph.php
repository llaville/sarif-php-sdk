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

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setFullName('CodeScanner 1.1, Developer Preview (en-US)');
$driver->setSemanticVersion('1.1.2-beta.12');
$driver->setVersion('1.1.2b12');

$tool = new Tool($driver);

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

$run = new Run($tool);
$run->addResults([$result]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
