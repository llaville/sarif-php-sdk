<!-- markdownlint-disable MD013 -->
# configurationOverride object

A `configurationOverride` object modifies the effective runtime configuration of a specified `reportingDescriptor` object,
which we refer to as theDescriptor.

=== ":simple-uml: Graph"

    ![configurationOverride object](../assets/images/reference-configuration-override.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php configurationOverride docs/assets/sarif 192`

    ```json title="docs/assets/sarif/configurationOverride.json"
    --8<-- "docs/assets/sarif/configurationOverride.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/configurationOverride.php"
    --8<-- "examples/configurationOverride.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/configurationOverride.php"
    --8<-- "examples/builder/configurationOverride.php"
    ```
