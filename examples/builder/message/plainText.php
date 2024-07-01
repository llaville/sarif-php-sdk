<?php
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Bartlett\Sarif\Factory\BuilderFactory;

$factory = new BuilderFactory();

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/message.md
$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('ESLint')
                            ->semanticVersion('8.1.0')
                            ->informationUri('https://eslint.org')
                            ->addRule(
                                $factory->rule()
                                    ->id('no-unused-vars')
                                    ->shortDescription('disallow unused variables')
                                    ->helpUri('https://eslint.org/docs/rules/no-unused-vars')
                                    ->setProperties([
                                        'category' => 'Variables',
                                    ])
                            )
                    )
            )
            ->addResult(
                $factory->result()
                    ->message(
                        $factory->message()
                            ->text("'x' is assigned a value but never used.")
                    )
                    ->ruleId('no-unused-vars')
                    ->ruleIndex(0)
                    ->level('error')
            )
            ->setProperties([])
    )
;
