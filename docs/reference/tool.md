<!-- markdownlint-disable MD013 -->
# tool object

A `tool` object describes the analysis tool or converter that was run.

=== ":simple-uml: Graph"

    ![tool object](../assets/images/reference-tool.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php tool docs/assets/sarif 192`

    ```json title="docs/assets/sarif/tool.json"
    --8<-- "docs/assets/sarif/tool.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/tool.php"
    --8<-- "examples/tool.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/tool.php"
    --8<-- "examples/builder/tool.php"
    ```
