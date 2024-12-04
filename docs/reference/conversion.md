<!-- markdownlint-disable MD013 -->
# conversion object

A `conversion` object describes how a converter transformed the output of an analysis tool
from the analysis tool’s native output format into the SARIF format.

=== ":simple-uml: Graph"

    ![conversion object](../assets/images/reference-conversion.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php conversion docs/assets/sarif 192`

    ```json title="docs/assets/sarif/conversion.json"
    --8<-- "docs/assets/sarif/conversion.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/conversion.php"
    --8<-- "examples/conversion.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/conversion.php"
    --8<-- "examples/builder/conversion.php"
    ```
