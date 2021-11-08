<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

/**
 * @author Laurent Laville
 */
trait EdgeId
{
    /**
     * @var string
     */
    protected $edgeId;

    /**
     * @param string $edgeId
     */
    public function setEdgeId(string $edgeId): void
    {
        $this->edgeId = $edgeId;
    }
}
