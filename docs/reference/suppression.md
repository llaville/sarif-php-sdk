<!-- markdownlint-disable MD013 -->
# suppression object

A `suppression` object describes a request to suppress a result.

=== ":simple-uml: Graph"

    ![suppression object](../assets/images/reference-suppression.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php suppression docs/assets/sarif 192`

    ```json title="docs/assets/sarif/suppression.json"
    --8<-- "docs/assets/sarif/suppression.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/suppression.php"
    --8<-- "examples/suppression.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/suppression.php"
    --8<-- "examples/builder/suppression.php"
    ```
