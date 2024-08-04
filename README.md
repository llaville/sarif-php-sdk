<!-- markdownlint-disable MD013 -->
# SARIF PHP SDK

[![StandWithUkraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/badges/StandWithUkraine.svg)](https://github.com/vshymanskyy/StandWithUkraine/blob/main/docs/README.md)
[![GitHub Discussions](https://img.shields.io/github/discussions/llaville/sarif-php-sdk)](https://github.com/llaville/sarif-php-sdk/discussions)

| Releases      |                    Branch                     |                               PHP                               |                          Packagist                          |                     License                      |                           Documentation                            |
|:--------------|:---------------------------------------------:|:---------------------------------------------------------------:|:-----------------------------------------------------------:|:------------------------------------------------:|:------------------------------------------------------------------:|
| Stable v1.0.x | [![Branch 1.0][Branch_100x-img]][Branch_100x] | [![Minimum PHP Version)][PHPVersion_100x-img]][PHPVersion_100x] | [![Stable Version 1.0][Packagist_100x-img]][Packagist_100x] | [![License 1.0][License_100x-img]][License_100x] | [![Documentation 1.0][Documentation_100x-img]][Documentation_100x] |
| Stable v1.1.x | [![Branch 1.1][Branch_101x-img]][Branch_101x] | [![Minimum PHP Version)][PHPVersion_101x-img]][PHPVersion_101x] | [![Stable Version 1.1][Packagist_101x-img]][Packagist_101x] | [![License 1.1][License_101x-img]][License_101x] | [![Documentation 1.1][Documentation_101x-img]][Documentation_101x] |
| Stable v1.2.x | [![Branch 1.2][Branch_102x-img]][Branch_102x] | [![Minimum PHP Version)][PHPVersion_102x-img]][PHPVersion_102x] | [![Stable Version 1.2][Packagist_102x-img]][Packagist_102x] | [![License 1.2][License_102x-img]][License_102x] | [![Documentation 1.2][Documentation_102x-img]][Documentation_102x] |
| Stable v1.3.x | [![Branch 1.3][Branch_103x-img]][Branch_103x] | [![Minimum PHP Version)][PHPVersion_103x-img]][PHPVersion_103x] | [![Stable Version 1.3][Packagist_103x-img]][Packagist_103x] | [![License 1.3][License_103x-img]][License_103x] | [![Documentation 1.3][Documentation_103x-img]][Documentation_103x] |
| Stable v1.4.x | [![Branch 1.4][Branch_104x-img]][Branch_104x] | [![Minimum PHP Version)][PHPVersion_104x-img]][PHPVersion_104x] | [![Stable Version 1.4][Packagist_104x-img]][Packagist_104x] | [![License 1.4][License_104x-img]][License_104x] | [![Documentation 1.4][Documentation_104x-img]][Documentation_104x] |
| Stable v1.5.x | [![Branch 1.5][Branch_105x-img]][Branch_105x] | [![Minimum PHP Version)][PHPVersion_105x-img]][PHPVersion_105x] | [![Stable Version 1.5][Packagist_105x-img]][Packagist_105x] | [![License 1.5][License_105x-img]][License_105x] | [![Documentation 1.5][Documentation_105x-img]][Documentation_105x] |
| Stable v2.0.x | [![Branch 2.0][Branch_200x-img]][Branch_200x] | [![Minimum PHP Version)][PHPVersion_200x-img]][PHPVersion_200x] | [![Stable Version 2.0][Packagist_200x-img]][Packagist_200x] | [![License 2.0][License_200x-img]][License_200x] | [![Documentation 2.0][Documentation_200x-img]][Documentation_200x] |

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

[Branch_101x-img]: https://img.shields.io/badge/branch-1.1-orange
[Branch_101x]: https://github.com/llaville/sarif-php-sdk/tree/1.1
[PHPVersion_101x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/1.1.0
[PHPVersion_101x]: https://www.php.net/supported-versions.php
[Packagist_101x-img]: https://img.shields.io/badge/packagist-v1.1.0-blue
[Packagist_101x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_101x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_101x]: https://github.com/llaville/sarif-php-sdk/blob/1.1/LICENSE
[Documentation_101x-img]: https://img.shields.io/badge/documentation-v1.1-green
[Documentation_101x]: https://github.com/llaville/sarif-php-sdk/tree/1.1/docs

[Branch_102x-img]: https://img.shields.io/badge/branch-1.2-orange
[Branch_102x]: https://github.com/llaville/sarif-php-sdk/tree/1.2
[PHPVersion_102x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/1.2.0
[PHPVersion_102x]: https://www.php.net/supported-versions.php
[Packagist_102x-img]: https://img.shields.io/badge/packagist-v1.2.0-blue
[Packagist_102x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_102x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_102x]: https://github.com/llaville/sarif-php-sdk/blob/1.2/LICENSE
[Documentation_102x-img]: https://img.shields.io/badge/documentation-v1.2-green
[Documentation_102x]: https://github.com/llaville/sarif-php-sdk/tree/1.2/docs

[Branch_103x-img]: https://img.shields.io/badge/branch-1.3-orange
[Branch_103x]: https://github.com/llaville/sarif-php-sdk/tree/1.3
[PHPVersion_103x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/1.3.0
[PHPVersion_103x]: https://www.php.net/supported-versions.php
[Packagist_103x-img]: https://img.shields.io/badge/packagist-v1.3.0-blue
[Packagist_103x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_103x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_103x]: https://github.com/llaville/sarif-php-sdk/blob/1.3/LICENSE
[Documentation_103x-img]: https://img.shields.io/badge/documentation-v1.3-green
[Documentation_103x]: https://github.com/llaville/sarif-php-sdk/tree/1.3/docs

[Branch_104x-img]: https://img.shields.io/badge/branch-1.4-orange
[Branch_104x]: https://github.com/llaville/sarif-php-sdk/tree/1.4
[PHPVersion_104x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/1.4.0
[PHPVersion_104x]: https://www.php.net/supported-versions.php
[Packagist_104x-img]: https://img.shields.io/badge/packagist-v1.4.0-blue
[Packagist_104x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_104x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_104x]: https://github.com/llaville/sarif-php-sdk/blob/1.4/LICENSE
[Documentation_104x-img]: https://img.shields.io/badge/documentation-v1.4-green
[Documentation_104x]: https://github.com/llaville/sarif-php-sdk/tree/1.4/docs

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
[PHPVersion_200x-img]: https://img.shields.io/packagist/php-v/bartlett/sarif-php-sdk/2.0.0
[PHPVersion_200x]: https://www.php.net/supported-versions.php
[Packagist_200x-img]: https://img.shields.io/badge/packagist-v2.0.0-blue
[Packagist_200x]: https://packagist.org/packages/bartlett/sarif-php-sdk
[License_200x-img]: https://img.shields.io/packagist/l/bartlett/sarif-php-sdk
[License_200x]: https://github.com/llaville/sarif-php-sdk/blob/2.0/LICENSE
[Documentation_200x-img]: https://img.shields.io/badge/documentation-v2.0-green
[Documentation_200x]: https://github.com/llaville/sarif-php-sdk/tree/2.0/docs

## Introduction

SARIF, the Static Analysis Results Interchange Format, defines a standard format for the output of static analysis tools.
It is a powerful and sophisticated format suited to the needs of a wide variety of tools.

## Specifications

The specification document for the Static Analysis Results Interchange Format (SARIF) version 2.1.0, in HTML format
is available [here][sarif-specs].

## View and validate your SARIF files

- [Upload and explore your SARIF file][sarif-validator]

## Documentation

All the documentation is available on [website](https://llaville.github.io/sarif-php-sdk/2.0),
generated from the [docs](https://github.com/llaville/sarif-php-sdk/tree/2.0/docs) folder.

- API [Reference](docs/reference/README.md) describes all SARIF objects with examples.

or

- Builder API [reference](docs/builder/README.md) as an alternative to build SARIF objects with a fluent interface.

And also

- [Study the tutorials][sarif-tutorials] from GitHub's Microsoft account.

[sarif-specs]: https://docs.oasis-open.org/sarif/sarif/v2.1.0/sarif-v2.1.0.html
[sarif-validator]: https://sarifweb.azurewebsites.net/Validation
[sarif-tutorials]: https://github.com/microsoft/sarif-tutorials
