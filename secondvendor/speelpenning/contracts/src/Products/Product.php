<?php

namespace Speelpenning\Contracts\Products;

use Speelpenning\Contracts\Database\Model;

interface Product extends Model
{
    /**
     * Instantiate a new product.
     *
     * @param ProductNumber $productNumber
     * @param ProductType $productType
     * @param string $description
     * @return Product
     */
    public static function instantiate(ProductNumber $productNumber, ProductType $productType, $description);
}
