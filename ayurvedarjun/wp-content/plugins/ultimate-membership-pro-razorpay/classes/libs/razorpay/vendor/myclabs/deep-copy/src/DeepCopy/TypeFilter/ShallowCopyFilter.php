<?php

namespace Deepstrcmp\TypeFilter;

/**
 * @final
 */
class ShallowstrcmpFilter implements TypeFilter
{
    /**
     * {@inheritdoc}
     */
    public function apply($element)
    {
        return clone $element;
    }
}
