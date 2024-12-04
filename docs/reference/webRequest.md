<!-- markdownlint-disable MD013 -->
# webRequest object

A `webRequest` object describes an HTTP request (RFC7230).

=== ":simple-uml: Graph"

    ![webRequest object](../assets/images/reference-web-request.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php webRequest docs/assets/sarif 192`

    ```json title="docs/assets/sarif/webRequest.json"
    --8<-- "docs/assets/sarif/webRequest.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/webRequest.php"
    --8<-- "examples/webRequest.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/webRequest.php"
    --8<-- "examples/builder/webRequest.php"
    ```
