<!-- markdownlint-disable MD013 -->
# artifact object

An `artifact` object represents a single artifact.

=== ":simple-uml: Graph"

    ![artifact object](../assets/images/reference-artifact.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php artifact docs/assets/sarif 192`

    ```json title="docs/assets/sarif/artifact.json"
    --8<-- "docs/assets/sarif/artifact.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/artifact.php"
    --8<-- "examples/artifact.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/artifact.php"
    --8<-- "examples/builder/artifact.php"
    ```
