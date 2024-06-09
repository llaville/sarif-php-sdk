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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/conversion.md
$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('AndroidStudio')
                            ->semanticVersion('1.0.0-beta.1')
                            ->informationUri('https://android-studion.dev')
                    )
            )
            ->conversion(
                $factory->conversion()
                    ->tool(
                        $factory->tool()
                            ->driver(
                                $factory->driver()
                                    ->name('SARIF SDK Multitool')
                            )
                    )
                    ->invocation(
                        $factory->invocation()
                            ->executionSuccessful(true)
                            ->commandLine('Sarif.Multitool.exe convert -t AndroidStudio northwind.log')
                    )
                    ->addAnalysisToolLogFile(
                        $factory->artifactLocation()
                            ->uri('northwind.log')
                            ->uriBaseId('$LOG_DIR$')
                    )
            )
    )
;
