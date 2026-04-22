<!-- markdownlint-disable MD013 -->
# SARIF PHP SDK

[![StandWithUkraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/badges/StandWithUkraine.svg)](https://github.com/vshymanskyy/StandWithUkraine/blob/main/docs/README.md)
[![GitHub Discussions](https://img.shields.io/github/discussions/llaville/sarif-php-sdk)](https://github.com/llaville/sarif-php-sdk/discussions)

| Releases      |                    Branch                     |                               PHP                               |                          Packagist                          |                     License                      |                           Documentation                            |
|:--------------|:---------------------------------------------:|:---------------------------------------------------------------:|:-----------------------------------------------------------:|:------------------------------------------------:|:------------------------------------------------------------------:|
| Stable v1.0.x | [![Branch 1.0][Branch_100x-img]][Branch_100x] | [![Minimum PHP Version)][PHPVersion_100x-img]][PHPVersion_100x] | [![Stable Version 1.0][Packagist_100x-img]][Packagist_100x] | [![License 1.0][License_100x-img]][License_100x] | [![Documentation 1.0][Documentation_100x-img]][Documentation_100x] |
| Stable v1.5.x | [![Branch 1.5][Branch_105x-img]][Branch_105x] | [![Minimum PHP Version)][PHPVersion_105x-img]][PHPVersion_105x] | [![Stable Version 1.5][Packagist_105x-img]][Packagist_105x] | [![License 1.5][License_105x-img]][License_105x] | [![Documentation 1.5][Documentation_105x-img]][Documentation_105x] |
| Stable v2.0.x | [![Branch 2.0][Branch_200x-img]][Branch_200x] | [![Minimum PHP Version)][PHPVersion_200x-img]][PHPVersion_200x] | [![Stable Version 2.0][Packagist_200x-img]][Packagist_200x] | [![License 2.0][License_200x-img]][License_200x] | [![Documentation 2.0][Documentation_200x-img]][Documentation_200x] |
| Stable v2.1.x | [![Branch 2.1][Branch_201x-img]][Branch_201x] | [![Minimum PHP Version)][PHPVersion_201x-img]][PHPVersion_201x] | [![Stable Version 2.1][Packagist_201x-img]][Packagist_201x] | [![License 2.1][License_201x-img]][License_201x] | [![Documentation 2.1][Documentation_201x-img]][Documentation_201x] |
| Stable v2.2.x | [![Branch 2.2][Branch_202x-img]][Branch_202x] | [![Minimum PHP Version)][PHPVersion_202x-img]][PHPVersion_202x] | [![Stable Version 2.2][Packagist_202x-img]][Packagist_202x] | [![License 2.2][License_202x-img]][License_202x] | [![Documentation 2.2][Documentation_202x-img]][Documentation_202x] |
| Stable v2.3.x | [![Branch 2.3][Branch_203x-img]][Branch_203x] | [![Minimum PHP Version)][PHPVersion_203x-img]][PHPVersion_203x] | [![Stable Version 2.3][Packagist_203x-img]][Packagist_203x] | [![License 2.3][License_203x-img]][License_203x] | [![Documentation 2.3][Documentation_203x-img]][Documentation_203x] |
| Stable v2.4.x | [![Branch 2.4][Branch_204x-img]][Branch_204x] | [![Minimum PHP Version)][PHPVersion_204x-img]][PHPVersion_204x] | [![Stable Version 2.4][Packagist_204x-img]][Packagist_204x] | [![License 2.4][License_204x-img]][License_204x] | [![Documentation 2.4][Documentation_204x-img]][Documentation_204x] |

[Branch_100x-img]: https://img.shields.io/badge/branch-1.0-orange
[Branch_100x]: https://github.com/llaville/sarif-php-sdk/tree/1.0
[PHPVersion_100x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/1.0.1
[PHPVersion_100x]: https://www.php.net/supported-versions.php
[Packagist_100x-img]: https://img.shields.io/badge/packagist-v1.0.1-blue
[Packagist_100x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_100x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_100x]: https://github.com/llaville/sarif-php-sdk/blob/1.0/LICENSE
[Documentation_100x-img]: https://img.shields.io/badge/documentation-v1.0-green
[Documentation_100x]: https://github.com/llaville/sarif-php-sdk/tree/1.0/docs

[Branch_105x-img]: https://img.shields.io/badge/branch-1.5-orange
[Branch_105x]: https://github.com/llaville/sarif-php-sdk/tree/1.5
[PHPVersion_105x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/1.5.0
[PHPVersion_105x]: https://www.php.net/supported-versions.php
[Packagist_105x-img]: https://img.shields.io/badge/packagist-v1.5.0-blue
[Packagist_105x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_105x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_105x]: https://github.com/llaville/sarif-php-sdk/blob/1.5/LICENSE
[Documentation_105x-img]: https://img.shields.io/badge/documentation-v1.5-green
[Documentation_105x]: https://github.com/llaville/sarif-php-sdk/tree/1.5/docs

[Branch_200x-img]: https://img.shields.io/badge/branch-2.0-orange
[Branch_200x]: https://github.com/llaville/sarif-php-sdk/tree/2.0
[PHPVersion_200x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/2.0.1
[PHPVersion_200x]: https://www.php.net/supported-versions.php
[Packagist_200x-img]: https://img.shields.io/badge/packagist-v2.0.1-blue
[Packagist_200x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_200x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_200x]: https://github.com/llaville/sarif-php-sdk/blob/2.0/LICENSE
[Documentation_200x-img]: https://img.shields.io/badge/documentation-v2.0-green
[Documentation_200x]: https://github.com/llaville/sarif-php-sdk/tree/2.0/docs

[Branch_201x-img]: https://img.shields.io/badge/branch-2.1-orange
[Branch_201x]: https://github.com/llaville/sarif-php-sdk/tree/2.1
[PHPVersion_201x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/2.1.1
[PHPVersion_201x]: https://www.php.net/supported-versions.php
[Packagist_201x-img]: https://img.shields.io/badge/packagist-v2.1.1-blue
[Packagist_201x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_201x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_201x]: https://github.com/llaville/sarif-php-sdk/blob/2.1/LICENSE
[Documentation_201x-img]: https://img.shields.io/badge/documentation-v2.1-green
[Documentation_201x]: https://github.com/llaville/sarif-php-sdk/tree/2.1/docs

[Branch_202x-img]: https://img.shields.io/badge/branch-2.2-orange
[Branch_202x]: https://github.com/llaville/sarif-php-sdk/tree/2.2
[PHPVersion_202x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/2.2.1
[PHPVersion_202x]: https://www.php.net/supported-versions.php
[Packagist_202x-img]: https://img.shields.io/badge/packagist-v2.2.1-blue
[Packagist_202x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_202x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_202x]: https://github.com/llaville/sarif-php-sdk/blob/2.2/LICENSE
[Documentation_202x-img]: https://img.shields.io/badge/documentation-v2.2-green
[Documentation_202x]: https://github.com/llaville/sarif-php-sdk/tree/2.2/docs

[Branch_203x-img]: https://img.shields.io/badge/branch-2.3-orange
[Branch_203x]: https://github.com/llaville/sarif-php-sdk/tree/2.3
[PHPVersion_203x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/2.3.0
[PHPVersion_203x]: https://www.php.net/supported-versions.php
[Packagist_203x-img]: https://img.shields.io/badge/packagist-v2.3.0-blue
[Packagist_203x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_203x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_203x]: https://github.com/llaville/sarif-php-sdk/blob/2.3/LICENSE
[Documentation_203x-img]: https://img.shields.io/badge/documentation-v2.3-green
[Documentation_203x]: https://github.com/llaville/sarif-php-sdk/tree/2.3/docs

[Branch_204x-img]: https://img.shields.io/badge/branch-2.4-orange
[Branch_204x]: https://github.com/llaville/sarif-php-sdk/tree/2.4
[PHPVersion_204x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/2.4.0
[PHPVersion_204x]: https://www.php.net/supported-versions.php
[Packagist_204x-img]: https://img.shields.io/badge/packagist-v2.4.0-blue
[Packagist_204x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_204x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_204x]: https://github.com/llaville/sarif-php-sdk/blob/2.4/LICENSE
[Documentation_204x-img]: https://img.shields.io/badge/documentation-v2.4-green
[Documentation_204x]: https://github.com/llaville/sarif-php-sdk/tree/2.4/docs

## Introduction

SARIF, the Static Analysis Results Interchange Format, defines a standard format for the output of static analysis tools.
It is a powerful and sophisticated format suited to the needs of a wide variety of tools.

## Specifications

Read the specification document for the Static Analysis Results Interchange Format (SARIF) version 2.1.0, in [HTML format][sarif-specs].

## View and validate your SARIF files

- [Upload and explore your SARIF file][sarif-validator]

## Documentation

All the documentation is available on [website](https://llaville.github.io/sarif-php-sdk/2.4),
generated from the [docs](https://github.com/llaville/sarif-php-sdk/tree/2.4/docs) folder.

- API [Reference](docs/reference/README.md) describes all SARIF objects with examples.

or

- Builder API [reference](docs/builder/README.md) as an alternative to build SARIF objects with a fluent interface.

And also

- [Study the tutorials][sarif-tutorials] from GitHub's Microsoft account.

## Add support to SARIF report into your application

Please have a look on project [Sarif-PHP-Converters][sarif-php-converters] that already gave support to 9 and more converters,
and learn how to build your own one !

[sarif-specs]: https://docs.oasis-open.org/sarif/sarif/v2.1.0/sarif-v2.1.0.html
[sarif-validator]: https://sarifweb.azurewebsites.net/Validation
[sarif-tutorials]: https://github.com/microsoft/sarif-tutorials
[sarif-php-converters]: https://github.com/llaville/sarif-php-converters
