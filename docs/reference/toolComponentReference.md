<!-- markdownlint-disable MD013 -->
# toolComponentReference object

A `toolComponentReference` object identifies a particular `toolComponent` object,
either theTool.driver or an element of theTool.extensions. We refer to the identified toolComponent object as theComponent.

=== ":simple-uml: Graph"

    ![toolComponentReference object](../assets/images/reference-tool-component-reference.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php reportingDescriptorRelationship docs/assets/sarif 192`

    ```json title="docs/assets/sarif/reportingDescriptorRelationship.json"
    --8<-- "docs/assets/sarif/reportingDescriptorRelationship.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/reportingDescriptorRelationship.php"
    --8<-- "examples/reportingDescriptorRelationship.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/reportingDescriptorRelationship.php"
    --8<-- "examples/builder/reportingDescriptorRelationship.php"
    ```
