<!-- markdownlint-disable MD013 -->
# externalProperties object

The top-level element of an external property file SHALL be an object which we refer to as an `externalProperties` object.

=== ":simple-uml: Graph"

    ![externalProperties object](../assets/images/reference-external-properties.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php externalProperties docs/assets/sarif 192`

    ```json title="docs/assets/sarif/externalProperties.json"
    --8<-- "docs/assets/sarif/externalProperties.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/externalProperties.php"
    --8<-- "examples/externalProperties.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/externalProperties.php"
    --8<-- "examples/builder/externalProperties.php"
    ```
