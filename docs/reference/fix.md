<!-- markdownlint-disable MD013 -->
# fix object

A `fix` object represents a proposed fix for the problem indicated by theResult. It specifies a set of artifacts to modify.
For each artifact, it specifies regions to remove, and provides new content to insert.

=== ":simple-uml: Graph"

    ![fix object](../assets/images/reference-fix.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php fix docs/assets/sarif 192`

    ```json title="docs/assets/sarif/fix.json"
    --8<-- "docs/assets/sarif/fix.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/fix.php"
    --8<-- "examples/fix.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/fix.php"
    --8<-- "examples/builder/fix.php"
    ```
