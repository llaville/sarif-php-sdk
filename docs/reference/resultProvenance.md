<!-- markdownlint-disable MD013 -->
# resultProvenance object

A `resultProvenance` object contains information about the how and when theResult was detected.

=== ":simple-uml: Graph"

    ![resultProvenance object](../assets/images/reference-result-provenance.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php resultProvenance docs/assets/sarif 192`

    ```json title="docs/assets/sarif/resultProvenance.json"
    --8<-- "docs/assets/sarif/resultProvenance.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/resultProvenance.php"
    --8<-- "examples/resultProvenance.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/resultProvenance.php"
    --8<-- "examples/builder/resultProvenance.php"
    ```
