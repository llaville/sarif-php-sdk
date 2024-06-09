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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/logicalLocation.md
$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('Psalm')
                            ->version('4.x-dev')
                            ->informationUri('https://psalm.de')
                    )
            )
            ->addLogicalLocation(
                $factory->logicalLocation()
                    ->name('Hook')
                    ->fullyQualifiedName('Psalm\Plugin\Hook')
                    ->kind('namespace')
            )
            ->addLogicalLocation(
                $factory->logicalLocation()
                    ->name('afterAnalysis')
                    ->fullyQualifiedName('Psalm\Plugin\Hook\AfterAnalysisInterface\afterAnalysis')
                    ->kind('function')
            )
    )
;
