<!-- markdownlint-disable MD013 -->
# physicalLocation object

A `physicalLocation` object represents the physical location where a result was detected.
A physical location specifies a reference to an artifact together with a region within that artifact.

=== ":simple-uml: Graph"

    ![physicalLocation object](../assets/images/reference-physical-location.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php physicalLocation docs/assets/sarif 192`

    ```json title="docs/assets/sarif/physicalLocation.json"
    --8<-- "docs/assets/sarif/physicalLocation.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/physicalLocation.php"
    --8<-- "examples/physicalLocation.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/physicalLocation.php"
    --8<-- "examples/builder/physicalLocation.php"
    ```
