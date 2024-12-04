<!-- markdownlint-disable MD013 -->
# codeFlow object

A `codeFlow` object describes the progress of one or more programs through one or more thread flows,
which together lead to the detection of a problem in the system being analyzed.

=== ":simple-uml: Graph"

    ![codeFlow object](../assets/images/reference-code-flow.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php codeFlow docs/assets/sarif 192`

    ```json title="docs/assets/sarif/codeFlow.json"
    --8<-- "docs/assets/sarif/codeFlow.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/codeFlow.php"
    --8<-- "examples/codeFlow.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/codeFlow.php"
    --8<-- "examples/builder/codeFlow.php"
    ```
