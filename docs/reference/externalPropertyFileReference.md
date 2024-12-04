<!-- markdownlint-disable MD013 -->
# externalPropertyFileReference object

An `externalPropertyFileReference` object contains information that enables a SARIF consumer
to locate the external property files that contain the values of all externalized properties associated with theRun.

=== ":simple-uml: Graph"

    ![externalPropertyFileReference object](../assets/images/reference-external-property-file-reference.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php externalPropertyFileReferences docs/assets/sarif 192`

    ```json title="docs/assets/sarif/externalPropertyFileReferences.json"
    --8<-- "docs/assets/sarif/externalPropertyFileReferences.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/externalPropertyFileReferences.php"
    --8<-- "examples/externalPropertyFileReferences.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/externalPropertyFileReferences.php"
    --8<-- "examples/builder/externalPropertyFileReferences.php"
    ```
