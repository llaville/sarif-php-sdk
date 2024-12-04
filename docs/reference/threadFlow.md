<!-- markdownlint-disable MD013 -->
# threadFlow object

A `threadFlow` object is a sequence of code locations that specify a possible path through a single thread of execution
such as an operating system thread or a fiber.

=== ":simple-uml: Graph"

    ![threadFlow object](../assets/images/reference-thread-flow.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php codeFlow docs/assets/sarif 192`

    ```json title="docs/assets/sarif/codeFlow.json"
    --8<-- "docs/assets/sarif/codeFlow.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/codeFlow.php"
    --8<-- "examples/codeFlow.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/codeFlow.php"
    --8<-- "examples/builder/codeFlow.php"
    ```
