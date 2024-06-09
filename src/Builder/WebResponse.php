<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class WebResponse extends Declaration
{
    protected string $protocol;
    protected string $version;
    protected int $statusCode;
    protected string $reasonPhrase;
    /**
     * @var array<string, string>
     */
    protected array $headers;

    public function protocol(string $protocol): self
    {
        $this->protocol = $protocol;
        return $this;
    }

    public function version(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function statusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function reasonPhrase(string $reasonPhrase): self
    {
        $this->reasonPhrase = $reasonPhrase;
        return $this;
    }

    public function addHeader(string $key, string $value): self
    {
        $this->headers[$key] = $value;
        return $this;
    }

    /**
     * Builds a valued instance of WebResponse definition.
     */
    public function build(): Definition\WebResponse
    {
        $response = new Definition\WebResponse();
        $this->populate($response);
        $response->addAdditionalProperties($this->headers);
        return $response;
    }
}
