<!-- markdownlint-disable MD013 -->
# stackFrame object

A `stackFrame` object describes a single stack frame within a call stack.

=== ":simple-uml: Graph"

    ![stackFrame object](../assets/images/reference-stack-frame.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php stack docs/assets/sarif 192`

    ```json title="docs/assets/sarif/stack.json"
    --8<-- "docs/assets/sarif/stack.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/stack.php"
    --8<-- "examples/stack.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/stack.php"
    --8<-- "examples/builder/stack.php"
    ```
