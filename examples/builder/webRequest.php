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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/webRequest.md
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
            ->addWebRequest(
                $factory->webRequest()
                    ->protocol('http')
                    ->version('1.1')
                    ->method('GET')
                    ->target('httpbin.org/bearer')
                    ->addHeader('accept', 'application/json')
                    ->addHeader('Authorization', 'none')
            )
            ->addWebResponse(
                $factory->webResponse()
                    ->protocol('http')
                    ->version('1.1')
                    ->statusCode(401)
                    ->reasonPhrase('Error: UNAUTHORIZED')
                    ->addHeader('access-control-allow-credentials', 'true')
                    ->addHeader('access-control-allow-origin', '*')
                    ->addHeader('connection', 'keep-alive')
                    ->addHeader('content-length', '0')
                    ->addHeader('content-type', 'text/html; charset=utf-8')
                    ->addHeader('date', 'Sun, 07 Nov 2021 08:59:53 GMT')
                    ->addHeader('server', 'gunicorn/19.9.0')
                    ->addHeader('www-authenticate', 'Bearer')
            )
    )
;
