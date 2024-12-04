<!-- markdownlint-disable MD013 -->
# edge object

A `edge` object represents a directed edge in the graph represented by theGraph.

=== ":simple-uml: Graph"

    ![edge object](../assets/images/reference-edge.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php graph docs/assets/sarif 192`

    ```json title="docs/assets/sarif/graph.json"
    --8<-- "docs/assets/sarif/graph.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/graph.php"
    --8<-- "examples/graph.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/graph.php"
    --8<-- "examples/builder/graph.php"
    ```
