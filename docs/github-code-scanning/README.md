<!-- markdownlint-disable MD013 -->
# GitHub Code Scanning

> You can use code scanning to find security vulnerabilities and errors in the code for your project on GitHub.
> Learn more on official [GitHub documentation][github-code-scanning]

GitHub Code Scanning features are compatible with SARIF.

> [!NOTE]
> Since version 1.2.0
>
> 1. The SARIF converter for PHP_CodeSniffer allows you to use [PHP_CodeSniffer][phpcs] as GitHub Code Scanning tool.
> 2. The SARIF converter for PHPLint allows you to use [PHPLint][phplint] as GitHub Code Scanning tool.
> 3. The SARIF converter for PHPStan allows you to use [PHPStan][phpstan] as GitHub Code Scanning tool.

Don't forget to add enough permissions in your jobs :

```yaml
    permissions:
        # required for all workflows
        security-events: write
        # only required for workflows in private repositories
        actions: read
        contents: read
```

And [enable CodeQL][enabling-code-scanning] in your repository :

- Follows [configuring default setup for code scanning][config-default-setup-code-scanning] steps.

> [!NOTE]
> Use [codeql-action](https://github.com/github/codeql-action) for running CodeQL analysis.

You can upload SARIF files generated outside GitHub and see code scanning alerts from third-party tools in your repository.

Learn more, and see how to [Upload a SARIF file to GitHub][upload-sarif-file-to-github].

## PHP_CodeSniffer

To use in one of your GitHub Actions workflows, add the following in your job:

```yaml
jobs:
    phpcs-analysis:
        name: PHPCS analysis

        steps:
            -   # https://github.com/llaville/sarif-php-sdk/tree/master/examples/converters/phpcs
                name: Install PHPCS SARIF Converter
                run: composer require --dev --prefer-dist --no-progress squizlabs/php_codesniffer bartlett/sarif-php-sdk

            -   # https://github.com/PHPCSStandards/PHP_CodeSniffer
                name: Run PHPCS analysis
                continue-on-error: true
                run: vendor/bin/phpcs --report='\Bartlett\Sarif\Converter\PhpCsConverter' --report-file=phpcs.sarif.json

            -   # https://github.com/github/codeql-action
                name: Upload analysis results to GitHub
                uses: github/codeql-action/upload-sarif@v3
                with:
                    sarif_file: phpcs.sarif.json
                    wait-for-processing: true
```

> [!WARNING]
> Be sure to have a PHPCS xml config file that declare a sufficient autoloader.

See full [CodeQL analysis](https://github.com/llaville/sarif-php-sdk/blob/1.3/.github/workflows/codeql.yml#L19) job.

## PHPLint

To use in one of your GitHub Actions workflows, add the following in your job:

```yaml
jobs:
    phplint-analysis:
        name: PHPLint analysis

        steps:
            -   # https://github.com/llaville/sarif-php-sdk/tree/master/examples/converters/phplint
                name: Install PHPLint SARIF Converter
                run: composer require --dev --prefer-dist --no-progress overtrue/phplint bartlett/sarif-php-sdk

            -   # https://github.com/overtrue/phplint
                name: Run PHPLint analysis
                continue-on-error: true
                run: vendor/bin/phplint --log-sarif=phplint.sarif.json --bootstrap autoload.php

            -   # https://github.com/github/codeql-action
                name: Upload analysis results to GitHub
                uses: github/codeql-action/upload-sarif@v3
                with:
                    sarif_file: phplint.sarif.json
                    wait-for-processing: true
```

> [!WARNING]
> Be sure to have a sufficient autoloader (`bootstrap` option), especially if you customize your SARIF converter.

See full [CodeQL analysis](https://github.com/llaville/sarif-php-sdk/blob/1.3/.github/workflows/codeql.yml#L82) job.

## PHPStan

To use in one of your GitHub Actions workflows, add the following in your job:

```yaml
jobs:
    phpstan-analysis:
        name: PHPStan analysis

        steps:
            -   # https://github.com/llaville/sarif-php-sdk/tree/master/examples/converters/phpstan
              name: Install PHPStan SARIF Converter
              run: composer require --dev --prefer-dist --no-progress phpstan/phpstan bartlett/sarif-php-sdk

            -   # https://github.com/phpstan/phpstan
              name: Run PHPStan analysis
              continue-on-error: true
              run: vendor/bin/phpstan analyze --configuration=phpstan.neon.dist --error-format=sarif --autoload-file vendor/autoload.php > phpstan.sarif.json

            -   # https://github.com/github/codeql-action
              name: Upload analysis results to GitHub
              uses: github/codeql-action/upload-sarif@v3
              with:
                  sarif_file: phpstan.sarif.json
                  wait-for-processing: true
```

> [!WARNING]
> Be sure to have a sufficient neon config file that defined the SARIF formatter to use.

E.g with default converter :

```yaml
services:
    errorFormatter.sarif:
        class: Bartlett\Sarif\Converter\PhpStanConverter
```

See full [CodeQL analysis](https://github.com/llaville/sarif-php-sdk/blob/1.3/.github/workflows/codeql.yml#L145) job.

[github-code-scanning]: https://docs.github.com/en/code-security/code-scanning/introduction-to-code-scanning/about-code-scanning
[enabling-code-scanning]: https://docs.github.com/en/code-security/code-scanning/enabling-code-scanning
[config-default-setup-code-scanning]: https://docs.github.com/en/code-security/code-scanning/enabling-code-scanning/configuring-default-setup-for-code-scanning
[upload-sarif-file-to-github]: https://docs.github.com/en/code-security/code-scanning/integrating-with-code-scanning/uploading-a-sarif-file-to-github
[phpcs]: https://github.com/PHPCSStandards/PHP_CodeSniffer/
[phplint]: https://github.com/overtrue/phplint
[phpstan]: https://github.com/phpstan/phpstan
