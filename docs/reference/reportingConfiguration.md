<!-- markdownlint-disable MD013 -->
# reportingConfiguration object

A `reportingConfiguration` object contains the information in a `reportingDescriptor` that a SARIF producer can modify
at runtime, before executing its scan.

=== ":simple-uml: Graph"

    ![reportingConfiguration object](../assets/images/reference-reporting-configuration.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php reportingConfiguration docs/assets/sarif 192`

    ```json title="docs/assets/sarif/reportingConfiguration.json"
    --8<-- "docs/assets/sarif/reportingConfiguration.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/reportingConfiguration.php"
    --8<-- "examples/reportingConfiguration.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/reportingConfiguration.php"
    --8<-- "examples/builder/reportingConfiguration.php"
    ```
