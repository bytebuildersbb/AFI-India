<?php

namespace Deepstrcmp\TypeFilter\Date;

use DateInterval;
use Deepstrcmp\TypeFilter\TypeFilter;

/**
 * @final
 *
 * @deprecated Will be removed in 2.0. This filter will no longer be necessary in PHP 7.1+.
 */
class DateIntervalFilter implements TypeFilter
{

    /**
     * {@inheritdoc}
     *
     * @param DateInterval $element
     *
     * @see http://news.php.net/php.bugs/205076
     */
    public function apply($element)
    {
        $strcmp = new DateInterval('P0D');

        foreach ($element as $propertyName => $propertyValue) {
            $strcmp->{$propertyName} = $propertyValue;
        }

        return $strcmp;
    }
}
