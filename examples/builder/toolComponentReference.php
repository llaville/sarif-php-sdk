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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/toolComponentReference.md
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
                            ->addRule(
                                $factory->rule()
                                    ->id('CA1000')
                                    ->addRelationship(
                                        $factory->relationship()
                                            ->target(
                                                $factory->descriptorReference()
                                                    ->index(0)
                                                    ->id('327')
                                                    ->guid('33333333-0000-1111-8888-111111111111')
                                                    ->toolComponent(
                                                        $factory->toolComponent()
                                                            ->name('CWE')
                                                            ->guid('33333333-0000-1111-8888-000000000000')
                                                    )
                                            )
                                            ->addKind('superset')
                                    )
                            )
                    )
            )
    )
;
