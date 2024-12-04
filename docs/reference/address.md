<!-- markdownlint-disable MD013 -->
# address object

An `address` object describes a physical or virtual address,
or a range of addresses, in an “addressable region” (memory or a binary file).

=== ":simple-uml: Graph"

    ![address object](../assets/images/reference-address.graphviz.svg)

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php address docs/assets/sarif 192`

    ```json title="docs/assets/sarif/address.json"
    --8<-- "docs/assets/sarif/address.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/address.php"
    --8<-- "examples/address.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/address.php"
    --8<-- "examples/builder/address.php"
    ```
