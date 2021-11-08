<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Message;

/**
 * @author Laurent Laville
 */
trait Label
{
    /**
     * @var Message
     */
    protected $label;

    /**
     * @param Message $label
     */
    public function setLabel(Message $label): void
    {
        $this->label = $label;
    }
}
