<!-- markdownlint-disable MD013 -->
# threadFlowLocation object

A `threadFlowLocation` object represents a location visited by an analysis tool
in the course of simulating or monitoring the execution of a program.

=== ":simple-uml: Graph"

    ![threadFlowLocation object](../assets/images/reference-thread-flow-location.graphviz.svg)

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
