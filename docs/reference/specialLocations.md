<!-- markdownlint-disable MD013 -->
# specialLocations object

A `specialLocations` object defines locations of special significance to SARIF consumers.

=== ":simple-uml: Graph"

    ![specialLocations object](../assets/images/reference-special-locations.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php specialLocations docs/assets/sarif 192`

    ```json title="docs/assets/sarif/specialLocations.json"
    --8<-- "docs/assets/sarif/specialLocations.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/specialLocations.php"
    --8<-- "examples/specialLocations.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/specialLocations.php"
    --8<-- "examples/builder/specialLocations.php"
    ```
