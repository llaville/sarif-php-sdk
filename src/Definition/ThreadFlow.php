<?php declare(strict_types=1);

namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Id;
use Bartlett\Sarif\Property\ImmutableState;
use Bartlett\Sarif\Property\InitialState;
use Bartlett\Sarif\Property\MessageString;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\ThreadFlowLocations;

/**
 * Describes a sequence of code locations that specify a path through a single thread of execution
 * such as an operating system or fiber.
 */
final class ThreadFlow extends JsonSerializable
{
    /**
     * A string that uniquely identifies the threadFlow within the codeFlow in which it occurs.
     */
    use Id;

    /**
     * A message relevant to the thread flow.
     */
    use MessageString;

    /**
     * Values of relevant expressions at the start of the thread flow that may change during thread flow execution.
     */
    use InitialState;

    /**
     * Values of relevant expressions at the start of the thread flow that remain constant.
     */
    use ImmutableState;

    /**
     * A temporally ordered array of 'threadFlowLocation' objects,
     * each of which describes a location visited by the tool while producing the result.
     */
    use ThreadFlowLocations;

    /**
     * Key/value pairs that provide additional information about the thread flow.
     */
    use Properties;

    /**
     * @param ThreadFlowLocation[] $locations
     */
    public function __construct(array $locations)
    {
        $this->addLocations($locations);

        $this->required = ['locations'];
        $this->optional = [
            'id',
            'message',
            'initialState',
            'immutableState',
            'properties'
        ];

    }
}
