<?php

namespace Speelpenning\Contracts\Products;

use Speelpenning\Contracts\Database\Model;

interface ProductType extends Model
{
    /**
     * Instantiate a new product type.
     *
     * @param string $description
     * @return ProductType
     */
    public static function instantiate($description);
}
