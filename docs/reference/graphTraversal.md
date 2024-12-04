<!-- markdownlint-disable MD013 -->
# graphTraversal object

A `graphTraversal` object represents a "graph traversal", that is, a path through
a graph specified by a sequence of connected "edge traversals", each of which is represented by an `edgeTraversal` object.

=== ":simple-uml: Graph"

    ![graphTraversal object](../assets/images/reference-graph-traversal.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php graphTraversal docs/assets/sarif 192`

    ```json title="docs/assets/sarif/graphTraversal.json"
    --8<-- "docs/assets/sarif/graphTraversal.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/graphTraversal.php"
    --8<-- "examples/graphTraversal.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/graphTraversal.php"
    --8<-- "examples/builder/graphTraversal.php"
    ```
