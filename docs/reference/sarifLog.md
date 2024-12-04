<!-- markdownlint-disable MD013 -->
# sarifLog object

A `sarifLog` object specifies the version of the file format and contains the output from one or more runs.

=== ":simple-uml: Graph"

    ![sarifLog object](../assets/images/reference-sarif-log.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php sarifLog docs/assets/sarif 192`

    ```json title="docs/assets/sarif/sarifLog.json"
    --8<-- "docs/assets/sarif/sarifLog.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/sarifLog.php"
    --8<-- "examples/sarifLog.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/sarifLog.php"
    --8<-- "examples/builder/sarifLog.php"
    ```
