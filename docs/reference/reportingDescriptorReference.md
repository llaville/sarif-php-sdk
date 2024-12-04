<!-- markdownlint-disable MD013 -->
# reportingDescriptorReference object

A `reportingDescriptorReference` object identifies a particular `reportingDescriptor` object,
which we refer to as theDescriptor, among all `reportingDescriptor` objects defined by theTool,
including those defined by theTool.driver and theTool.extensions.

=== ":simple-uml: Graph"

    ![reportingDescriptorReference object](../assets/images/reference-reporting-descriptor-reference.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php reportingDescriptorReference docs/assets/sarif 192`

    ```json title="docs/assets/sarif/reportingDescriptorReference.json"
    --8<-- "docs/assets/sarif/reportingDescriptorReference.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/reportingDescriptorReference.php"
    --8<-- "examples/reportingDescriptorReference.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/reportingDescriptorReference.php"
    --8<-- "examples/builder/reportingDescriptorReference.php"
    ```
