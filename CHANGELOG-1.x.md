<!-- markdownlint-disable MD013 MD024 -->
# Changes of versions 1.x

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html),
and is generated by [Changie](https://github.com/miniscruff/changie).

## 1.5.0 - 2024-06-15

### Added

Fluent builders API as an alternative to basic declarative API.
See [Builder Guide](https://github.com/llaville/sarif-php-sdk/tree/1.5/docs/builder)

**Full Changelog**: [1.4.0...1.5.0](https://github.com/llaville/sarif-php-sdk/compare/1.4.0...1.5.0)

## 1.4.0 - 2024-06-02

I'm happy to announce a new converter :

### Added

- PHPMD : [PHP Mess Detector](https://github.com/phpmd/phpmd)

> [!NOTE]
> Even if PHPMD has a native [SARIF renderer](https://github.com/phpmd/phpmd/issues/858) since v2.10.0,
> this new converter provide more info, and is customizable as others.

**Full Changelog**: [1.3.0...1.4.0](https://github.com/llaville/sarif-php-sdk/compare/1.3.0...1.4.0)

## 1.3.0 - 2024-05-24

I'm happy to announce next level of SARIF converters improvements :

### Changed

For all converters :

- Add ability to retrieve code snippet (`snippet` property of `region` object).
- Add `automationDetails` on `Bartlett\Sarif\Converter\ConverterInterface` with a default implementation
  into `Bartlett\Sarif\Converter\AbstractConverter`.
- Add ability to print `startTimeUtc` and `endTimeUtc` properties of `invocation` object.
- Add ability to print `commandLine` property of `invocation` object.
- Add ability to provide a `fullName` property of `toolComponent` object (driver). This property is required by the Azure DevOps Advanced Security service.

**PHP_CodeSniffer** :

- Add `originalUriBaseIds` property on `run` object.
- Add `partialFingerprints` property of `result` object. This property is required by the GitHub Advanced Security service.
- Supports now the `responseFiles` property of `invocation` object.

**PHPLint** :

- Creation of a custom launcher is no more necessary with PHPLint 9.3.1 or greater. Use the `--bootstrap` option.
- Add `partialFingerprints` property of `result` object. This property is required by the GitHub Advanced Security service.
- Introduces a single `ReportingDescriptor` (rule) for syntax errors.
- Supports now the `responseFiles` property of `invocation` object.

**PHPStan** :

- Add `partialFingerprints` property of `result` object. This property is required by the GitHub Advanced Security service.
- Introduces a single `ReportingDescriptor` (rule) for analysis errors.

### Fixed

- for all converters, make path really relative to working directory.

**Full Changelog**: [1.2.0...1.3.0](https://github.com/llaville/sarif-php-sdk/compare/1.2.0...1.3.0)

## 1.2.0 - 2024-05-02

I'm happy to announce adds of SARIF converters for three well-known PHP linters :

- PHP_CodeSniffer (see feature request <https://github.com/squizlabs/PHP_CodeSniffer/issues/3496>)
- PHPLint (see feature request <https://github.com/overtrue/phplint/issues/186>)
- PHPStan (see feature request <https://github.com/phpstan/phpstan/issues/5973>)

### Added

- `Bartlett\Sarif\Factory\SerializerFactory` contract that define encoder and serializer
for json data (compatible with [Symfony Serializer Component](https://symfony.com/serializer))
- Native PHP JSON implementation with `Bartlett\Sarif\Factory\PhpSerializerFactory`
- Symfony Serializer implementation with `Bartlett\Sarif\Factory\SymfonySerializerFactory`

**Full Changelog**: [1.1.0...1.2.0](https://github.com/llaville/sarif-php-sdk/compare/1.1.0...1.2.0)

## 1.1.0 - 2024-01-07

### Added

- introduces the new `resources/serialize.php` script (to demonstrate usage with help of Symfony/Serializer component)
- all unit tests missing from first release 1.0

### Changed

- raise minimum PHP requirement (7.4 or greater) for property type hinting
- add type hinting on properties and upgrade phpDoc blocks
- remove try/catch bloc that print the final SarifLog object in json format on all examples scripts
- API: `SarifLog` is no more marked as final to be able to extends or change current (`__toString`, `jsonSerializable`) behavior

### Fixed

Codebase is now PHPStan rule level 9 compatible :

- `ExternalPropertyFileReference` definition with optional values
- `GraphTraversal` definition with optional values
- `PhysicalLocation` definition with optional values
- `Region` definition with optional values
- `Taxonomies` property

**Full Changelog**: [1.0.1...1.1.0](https://github.com/llaville/sarif-php-sdk/compare/1.0.1...1.1.0)

## 1.0.1 - 2021-12-20

### Fixed

- clean-up code in `PropertyBag` because duplicated keys is not possible

**Full Changelog**: [1.0.0...1.0.1](https://github.com/llaville/sarif-php-sdk/compare/1.0.0...1.0.1)

## 1.0.0 - 2021-11-09

Implements full [SARIF specifications 2.1.0](https://docs.oasis-open.org/sarif/sarif/v2.1.0/sarif-v2.1.0.html)

**Full Changelog**: [1584943...1.0.0](https://github.com/llaville/sarif-php-sdk/compare/1584943...1.0.0)