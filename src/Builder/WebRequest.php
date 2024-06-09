<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class WebRequest extends Declaration
{
    protected string $protocol;
    protected string $version;
    protected string $method;
    /**
     * @var array<string, string>
     */
    protected array $headers;
    protected string $target;

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

    public function method(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    public function target(string $target): self
    {
        $this->target = $target;
        return $this;
    }

    public function addHeader(string $key, string $value): self
    {
        $this->headers[$key] = $value;
        return $this;
    }

    /**
     * Builds a valued instance of WebRequest definition.
     */
    public function build(): Definition\WebRequest
    {
        $request = new Definition\WebRequest();
        $this->populate($request);
        $request->addAdditionalPropertiesHeaders($this->headers);
        return $request;
    }
}
