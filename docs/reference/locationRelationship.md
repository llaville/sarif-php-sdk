<!-- markdownlint-disable MD013 -->
# locationRelationship object

A `locationRelationship` object specifies one or more directed relationships from one location object,
which we refer to as theSource, to another one, which we refer to as theTarget.

=== ":simple-uml: Graph"

    ![locationRelationship object](../assets/images/reference-location-relationship.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php locationRelationship docs/assets/sarif 192`

    ```json title="docs/assets/sarif/locationRelationship.json"
    --8<-- "docs/assets/sarif/locationRelationship.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/locationRelationship.php"
    --8<-- "examples/locationRelationship.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/locationRelationship.php"
    --8<-- "examples/builder/locationRelationship.php"
    ```
