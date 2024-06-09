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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/specialLocations.md
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
                    )
            )
            ->addOriginalUriBaseId(
                'WEBHOST',
                $factory->artifactLocation()
                    ->uri('http://www.example.com/')
            )
            ->addOriginalUriBaseId(
                'ROOT',
                $factory->artifactLocation()
                    ->uri('file:///')
            )
            ->addOriginalUriBaseId(
                'HOME',
                $factory->artifactLocation()
                    ->uri('home/user/')
                    ->uriBaseId('ROOT')
            )
            ->addOriginalUriBaseId(
                'PACKAGE',
                $factory->artifactLocation()
                    ->uri('mySoftware/')
                    ->uriBaseId('HOME')
            )
            ->addOriginalUriBaseId(
                'SRC',
                $factory->artifactLocation()
                    ->uri('src/')
                    ->uriBaseId('PACKAGE')
            )
            ->specialLocations(
                $factory->specialLocations()
                    ->displayBase(
                        $factory->artifactLocation()
                            ->uriBaseId('PACKAGE')
                    )
            )
    )
;
