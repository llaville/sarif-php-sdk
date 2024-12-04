<!-- markdownlint-disable MD013 -->
# artifactContent object

Certain properties in this document represent the contents of portions of artifacts external to the log file,
for example, artifacts that were scanned by an analysis tool. SARIF represents such content with an `artifactContent` object.
Depending on the circumstances, the SARIF log file might need to represent this content as readable text, raw bytes, or both.

=== ":simple-uml: Graph"

    ![artifactContent object](../assets/images/reference-artifact-content.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php fix docs/assets/sarif 192`

    ```json title="docs/assets/sarif/fix.json"
    --8<-- "docs/assets/sarif/fix.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/fix.php"
    --8<-- "examples/fix.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/fix.php"
    --8<-- "examples/builder/fix.php"
    ```
