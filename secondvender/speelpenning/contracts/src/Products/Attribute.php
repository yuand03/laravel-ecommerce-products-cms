<?php

namespace Speelpenning\Contracts\Products;

use Speelpenning\Contracts\Database\Model;

interface Attribute extends Model
{
    /**
     * Instantiates a new attribute.
     *
     * @param string $description
     * @param string $type
     * @return Attribute
     */
    public static function instantiate($description, $type);

    /**
     * Returns an array with allowed attribute types following the Laravel validation rules.
     *
     * @return array
     */
    public static function getAllowedTypes();

    /**
     * Indicates if the attribute supports values.
     *
     * @return bool
     */
    public function supportsValues();
}
