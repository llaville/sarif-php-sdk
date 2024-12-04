<!-- markdownlint-disable MD013 -->
# invocation object

An `invocation` object describes the invocation of the analysis tool that was run.

=== ":simple-uml: Graph"

    ![invocation object](../assets/images/reference-invocation.graphviz.svg)

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
