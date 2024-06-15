<!-- markdownlint-disable MD013 -->
# Builders

When SARIF PHP SDK is used to generate reports the standard API reclaims to declare each object and know how to link them.
It can often be tedious to manually construct objects.

Since release 1.5.0, the project provides a number of utilities to simplify the construction of sarif objects with their properties.

![builder factory](../assets/images/builder-api.graphviz.svg)

## Fluent builders

The library comes with a number of builders, which allow creating sarif objects using a fluent interface.
Builders are created using the `Bartlett\Sarif\Factory\BuilderFactory` and the final constructed object is accessed through `build()`.

Here is an example:

```php
<?php
use Bartlett\Sarif\Factory\BuilderFactory;

$factory = new BuilderFactory();

$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('Psalm')
                            ->version('4.x-dev')
                            ->informationUri('https://psalm.de')
                    )
            )
            ->setProperties([
                'stableId' => 'Nightly static analysis run',
            ])
    )
;

$sarifLogObject = $spec->build();
```
