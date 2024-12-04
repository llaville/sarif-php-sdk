<!-- markdownlint-disable MD013 -->
# exception object

An `exception` object describes a runtime exception encountered during the execution of an analysis tool.
This includes signals in POSIX-conforming operating systems.

=== ":simple-uml: Graph"

    ![exception object](../assets/images/reference-exception.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php exception docs/assets/sarif 192`

    ```json title="docs/assets/sarif/exception.json"
    --8<-- "docs/assets/sarif/exception.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/exception.php"
    --8<-- "examples/exception.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/exception.php"
    --8<-- "examples/builder/exception.php"
    ```
