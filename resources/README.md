# Resources

This section reference resources used to :

- generates graphics (UML graphs, Composer Graph) for documentation
- produces SARIF output with converters to most common PHP linters that didn't support it natively

## Graphics for documentation

Uses the `gh-pages-hook.sh` shell script to build SVG images into `docs/assets/images` directory.

## Test results

Uses the `serialize-test-results.sh` shell script to build SARIF results of all examples available
into `tests/results` directory.

## SARIF converters

> [!NOTE]
> Since [v1.2.0](https://github.com/llaville/sarif-php-sdk/releases/tag/1.2.0) this SDK added 3 converters
> to PHPCS, PHPLint and PHPStan that did not support SARIF output natively

Learn more about :

- [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/issues/3496) SARIF output
- [PHPLint](https://github.com/overtrue/phplint/issues/186) SARIF output
- [PHPStan](https://github.com/phpstan/phpstan/issues/5973) SARIF output
