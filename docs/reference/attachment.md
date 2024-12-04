<!-- markdownlint-disable MD013 -->
# attachment object

An `attachment` object describes an artifact relevant to the detection of a result.

=== ":simple-uml: Graph"

    ![attachment object](../assets/images/reference-attachment.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php attachment docs/assets/sarif 192`

    ```json title="docs/assets/sarif/attachment.json"
    --8<-- "docs/assets/sarif/attachment.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/attachment.php"
    --8<-- "examples/attachment.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/attachment.php"
    --8<-- "examples/builder/attachment.php"
    ```
