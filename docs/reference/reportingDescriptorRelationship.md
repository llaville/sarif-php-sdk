<!-- markdownlint-disable MD013 -->
# reportingDescriptorRelationship object

A `reportingDescriptorRelationship` object specifies one or more directed relationships
from one `reportingDescriptor` object, which we refer to as theSource, to another one, which we refer to as theTarget.

=== ":simple-uml: Graph"

    ![reportingDescriptorRelationship object](../assets/images/reference-reporting-descriptor-relationship.graphviz.svg)

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
