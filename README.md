# Documentation

Here are the links to the documentation for versions that are still supported : 

- [SARIF PHP SDK 1.0](https://llaville.github.io/sarif-php-sdk/1.0/)
- [SARIF PHP SDK 1.1](https://llaville.github.io/sarif-php-sdk/1.1/)

Full documentation may be found in `docs` folder into this repository, and may be read online without to do anything else.

As alternative, you may generate a professional static site with [Material for MkDocs][mkdocs-material].

Configuration file `mkdocs.yml` is available and if you have Docker support, 
the documentation site can be simply build with following command:

```shell
docker run --rm -it -u "$(id -u):$(id -g)" -v ${PWD}:/docs squidfunk/mkdocs-material build --verbose
```

[mkdocs-material]: https://github.com/squidfunk/mkdocs-material
