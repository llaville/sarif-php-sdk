<!-- markdownlint-disable MD013 -->
# message object

Certain objects in this document define messages intended to be viewed by a user.
SARIF represents such a message with a `message` object, which offers the following features:

- Message strings in plain text (“plain text messages”).
- Message strings that incorporate formatting information (“formatted messages”) in GitHub Flavored Markdown.
- Message strings with placeholders for variable information.
- Message strings with embedded links.

![message object](../assets/images/reference-message.graphviz.svg)

## PlainText Example

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php message/plainText docs/assets/sarif 192`

    ```json title="docs/assets/sarif/message/plainText.json"
    --8<-- "docs/assets/sarif/message/plainText.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/message/plainText.php"
    --8<-- "examples/message/plainText.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/message/plainText.php"
    --8<-- "examples/builder/message/plainText.php"
    ```

## Formatted Example

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php message/formatted docs/assets/sarif 192`

    ```json title="docs/assets/sarif/message/formatted.json"
    --8<-- "docs/assets/sarif/message/formatted.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/message/formatted.php"
    --8<-- "examples/message/formatted.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/message/formatted.php"
    --8<-- "examples/builder/message/formatted.php"
    ```

## Embedded links Example

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php message/embeddedLinks docs/assets/sarif 192`

    ```json title="docs/assets/sarif/message/embeddedLinks.json"
    --8<-- "docs/assets/sarif/message/embeddedLinks.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/message/embeddedLinks.php"
    --8<-- "examples/message/embeddedLinks.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/message/embeddedLinks.php"
    --8<-- "examples/builder/message/embeddedLinks.php"
    ```

## String lookup Example

=== ":octicons-file-code-16: sarif.json"

    > [!TIP]
    >
    > Generated with following command : `php ./resources/serialize.php message/stringLookup docs/assets/sarif 192`

    ```json title="docs/assets/sarif/message/stringLookup.json"
    --8<-- "docs/assets/sarif/message/stringLookup.json"
    ```

=== ":simple-php: Simple API"

    ```php title="examples/message/stringLookup.php"
    --8<-- "examples/message/stringLookup.php"
    ```

=== ":simple-php: Fluent Builder API"

    > [!NOTE]
    > This alternative API is available since release 1.5.0

    ```php title="examples/builder/message/stringLookup.php"
    --8<-- "examples/builder/message/stringLookup.php"
    ```
