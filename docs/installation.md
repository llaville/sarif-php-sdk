<!-- markdownlint-disable MD013 -->
# Installation

1. [Requirements](#requirements)
2. [PHAR](#phar)
3. [Phive](#phive)
4. [Composer](#composer)
5. [Git](#git)

## Requirements

* PHP 7.4 or greater
* ext-json
* ext-pcre
* ext-spl

## PHAR

The preferred method of installation is to use the PHAR version which can be downloaded from the most recent
[Github Release][releases]. This method ensures you will not have any dependency conflict issue.

> **TIP** When you want to use, load autoloader as follows :
> ```php
> require_once 'phar://' . '/absolute/path/to' . '/sarif-php-sdk.phar/vendor/autoload.php';
> ```

## Phive

You can install application globally with [Phive][phive]

```shell
phive install llaville/sarif-php-sdk --force-accept-unsigned
```

To upgrade global installation of the application use the following command:

```shell
phive update llaville/sarif-php-sdk --force-accept-unsigned
```

You can also install application locally to your project with [Phive][phive] and configuration file `.phive/phars.xml`

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phive xmlns="https://phar.io/phive">
    <phar name="llaville/sarif-php-sdk" version="^1.1" copy="false" />
</phive>
```

```shell
phive install --force-accept-unsigned
```

## Composer

The recommended way to install this library is [through composer][composer].
If you don't know yet what is composer, have a look [on introduction][composer-intro].

```shell
composer require bartlett/sarif-php-sdk ^1.1
```

If you cannot install it because of a dependency conflict, or you prefer to install it for your project, we recommend
you to take a look at [bamarni/composer-bin-plugin][bamarni/composer-bin-plugin]. Example:

```shell
composer require --dev bamarni/composer-bin-plugin
composer bin sarif-php-sdk require --dev bartlett/sarif-php-sdk
```

## Git

The SARIF PHP SDK can be directly used from [GitHub][github-repo] by cloning the repository into a directory of your choice.

```shell
git clone -b 1.1 https://github.com/llaville/sarif-php-sdk.git
```

[releases]: https://github.com/llaville/sarif-php-sdk/releases/
[composer]: https://getcomposer.org
[composer-intro]: http://getcomposer.org/doc/00-intro.md
[bamarni/composer-bin-plugin]: https://github.com/bamarni/composer-bin-plugin
[github-repo]: https://github.com/llaville/sarif-php-sdk.git
[phive]: https://github.com/phar-io/phive
