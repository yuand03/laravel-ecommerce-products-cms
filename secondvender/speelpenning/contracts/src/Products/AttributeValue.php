<?php

namespace Speelpenning\Contracts\Products;

use Speelpenning\Contracts\Database\Model;

interface AttributeValue extends Model
{
    /**
     * Instantiates a new attribute value.
     *
     * @param Attribute $attribute
     * @param string $value
     * @return AttributeValue
     */
    public static function instantiate(Attribute $attribute, $value);
}
