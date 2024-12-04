<!-- markdownlint-disable MD013 -->
# result object

A `result` object describes a single result detected by an analysis tool.

=== ":simple-uml: Graph"

    ![result object](../assets/images/reference-result.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php result docs/assets/sarif 192`

    ```json title="docs/assets/sarif/result.json"
    --8<-- "docs/assets/sarif/result.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/result.php"
    --8<-- "examples/result.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/result.php"
    --8<-- "examples/builder/result.php"
    ```
