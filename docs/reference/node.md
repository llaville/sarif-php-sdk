<!-- markdownlint-disable MD013 -->
# node object

A `node` object represents a node in the graph represented by the containing graph object, which we refer to as theGraph.

=== ":simple-uml: Graph"

    ![node object](../assets/images/reference-node.graphviz.svg)

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
