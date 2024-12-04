<!-- markdownlint-disable MD013 -->
# translationMetadata object

A `translationMetadata` object defines locations of special significance to SARIF consumers.

=== ":simple-uml: Graph"

    ![translationMetadata object](../assets/images/reference-translation-metadata.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php translationMetadata docs/assets/sarif 192`

    ```json title="docs/assets/sarif/translationMetadata.json"
    --8<-- "docs/assets/sarif/translationMetadata.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/translationMetadata.php"
    --8<-- "examples/translationMetadata.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/translationMetadata.php"
    --8<-- "examples/builder/translationMetadata.php"
    ```
