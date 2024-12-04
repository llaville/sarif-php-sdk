<!-- markdownlint-disable MD013 -->
# logicalLocation object

A `logicalLocation` object describes a logical location.
A logical location is a location specified by a programmatic construct such as a namespace, a type, or a method,
without regard to the physical location where the construct occurs.

=== ":simple-uml: Graph"

    ![logicalLocation object](../assets/images/reference-logical-location.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php logicalLocation docs/assets/sarif 192`

    ```json title="docs/assets/sarif/logicalLocation.json"
    --8<-- "docs/assets/sarif/logicalLocation.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/logicalLocation.php"
    --8<-- "examples/logicalLocation.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/logicalLocation.php"
    --8<-- "examples/builder/logicalLocation.php"
    ```
