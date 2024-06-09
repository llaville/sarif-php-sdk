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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/runAutomationDetails.md
$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('CodeScanner')
                            ->fullName('CodeScanner 1.1, Developer Preview (en-US)')
                            ->version('1.1.2b12')
                            ->semanticVersion('1.1.2-beta.12')
                            ->informationUri('https://codeScanner.dev')
                    )
            )
            ->automationDetails(
                $factory->automationDetails()
                    ->description(
                        "This is the {0} nightly run of the Credential Scanner tool" .
                        " on all product binaries in the '{1}' branch of the '{2}' repo." .
                        " The scanned binaries are architecture '{3}' and build type '{4}'.",
                        '',
                        [
                            "October 10, 2018",
                            "master",
                            "sarif-sdk",
                            "x86",
                            "debug",
                        ]
                    )
                    ->id('Nightly CredScan run for sarif-sdk/master/x86/debug/2018-10-05')
                    ->guid('11111111-1111-1111-8888-111111111111')
                    ->correlationGuid('22222222-2222-1111-8888-222222222222')
            )
    )
;
