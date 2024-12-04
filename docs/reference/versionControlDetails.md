<!-- markdownlint-disable MD013 -->
# versionControlDetails object

A `versionControlDetails` object specifies the information necessary to retrieve from a version control system (VCS)
the correct revision of the files that were scanned during the run.

=== ":simple-uml: Graph"

    ![versionControlDetails object](../assets/images/reference-version-control-details.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php versionControlDetails docs/assets/sarif 192`

    ```json title="docs/assets/sarif/versionControlDetails.json"
    --8<-- "docs/assets/sarif/versionControlDetails.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/versionControlDetails.php"
    --8<-- "examples/versionControlDetails.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/versionControlDetails.php"
    --8<-- "examples/builder/versionControlDetails.php"
    ```
