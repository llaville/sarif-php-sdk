<?php
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 * @since Release 9.2.0
 */

namespace MyStandard\CS;

require_once __DIR__ . '/MySerializer.php';

use Bartlett\Sarif\Converter\PhpCsConverter;
use Bartlett\Sarif\Definition\ReportingDescriptor;

use function array_unique;
use function is_string;

class MyConverter extends PhpCsConverter
{
    public function __construct()
    {
        $factory = new MySerializerFactory(true);
        parent::__construct($factory);
    }

    /**
     * Here we want list of PHP CS rules but not the frequency calls (as default behavior)
     *
     * @return ReportingDescriptor[]
     */
    public function rules(): array
    {
        $rules = [];

        foreach (array_unique($this->rules) as $source) {
            if (is_string($source)) {
                $rules[] = new ReportingDescriptor($source);
            }
        }

        return $rules;
    }
}
