<!-- markdownlint-disable MD013 -->
# notification object

A `notification` object describes a condition encountered during the execution of an analysis tool
which is relevant to the operation of the tool itself, as opposed to being relevant to an artifact being analyzed by the tool.
Conditions relevant to artifacts being analyzed by a tool are represented by `result` objects.

=== ":simple-uml: Graph"

    ![notification object](../assets/images/reference-notification.graphviz.svg)

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
