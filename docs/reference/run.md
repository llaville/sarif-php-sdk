<!-- markdownlint-disable MD013 -->
# run object

A `run` object describes a single run of an analysis tool and contains the output of that run.

=== ":simple-uml: Graph"

    ![run object](../assets/images/reference-run.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php run docs/assets/sarif 192`

    ```json title="docs/assets/sarif/run.json"
    --8<-- "docs/assets/sarif/run.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/run.php"
    --8<-- "examples/run.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/run.php"
    --8<-- "examples/builder/run.php"
    ```
