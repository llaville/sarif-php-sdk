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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/result.md
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
                                    ->id('CA2101')
                                    ->shortDescription('Specify marshaling for P/Invoke string arguments.')
                            )
                            ->addRule(
                                $factory->rule()
                                    ->id('CA5350')
                                    ->shortDescription('Do not use weak cryptographic algorithms.')
                            )
                    )
            )
            ->addResult(
                $factory->result()
                    ->message(
                        $factory->message()
                            ->text('Result on rule 0')
                    )
                    ->ruleId('CA2101')
                    ->ruleIndex(0)
            )
            ->addResult(
                $factory->result()
                    ->message(
                        $factory->message()
                            ->text('Result on rule 1')
                    )
                    ->ruleId('CA5350/md5')
                    ->ruleIndex(1)
            )
            ->addResult(
                $factory->result()
                    ->message(
                        $factory->message()
                            ->text('Another result on rule 1')
                    )
                    ->ruleId('CA5350/sha-1')
                    ->ruleIndex(1)
            )
    )
;
