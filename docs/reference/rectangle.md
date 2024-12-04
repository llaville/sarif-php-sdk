<!-- markdownlint-disable MD013 -->
# rectangle object

A `rectangle` object specifies a rectangular area within an image.
When a SARIF viewer displays an image, it MAY indicate the presence of these areas,
for example, by highlighting them or surrounding them with a border.

=== ":simple-uml: Graph"

    ![rectangle object](../assets/images/reference-rectangle.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php rectangle docs/assets/sarif 192`

    ```json title="docs/assets/sarif/rectangle.json"
    --8<-- "docs/assets/sarif/rectangle.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/rectangle.php"
    --8<-- "examples/rectangle.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/rectangle.php"
    --8<-- "examples/builder/rectangle.php"
    ```
