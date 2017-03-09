<?php

namespace Speelpenning\Contracts\Products\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Speelpenning\Contracts\Products\Product;
use Speelpenning\Contracts\Products\ProductType;

interface ProductTypeRepository
{
    /**
     * Returns a collection with all product types.
     *
     * @return Collection
     */
    public function all();

    /**
     * Destroys a product type.
     *
     * @param ProductType $productType
     * @return bool
     */
    public function destroy(ProductType $productType);

    /**
     * Finds a product type by id.
     *
     * @param int $id
     * @param array $relations
     * @return ProductType
     */
    public function find($id, array $relations = []);

    /**
     * Returns the product type belonging to the given product.
     *
     * @param Product $product
     * @return ProductType
     */
    public function getByProduct(Product $product);

    /**
     * Returns a collection of product types.
     *
     * @param string|null $q
     * @return LengthAwarePaginator
     */
    public function query($q = null);

    /**
     * Stores a product type.
     *
     * @param ProductType $productType
     * @return bool
     */
    public function save(ProductType $productType);
}
