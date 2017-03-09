<?php

namespace Speelpenning\Contracts\Products\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Speelpenning\Contracts\Products\Product;
use Speelpenning\Contracts\Products\ProductNumber;

interface ProductRepository
{
    /**
     * Removes a product from the repository.
     *
     * @param Product $product
     * @return bool
     */
    public function destroy(Product $product);

    /**
     * Finds a product by id.
     *
     * @param int $id
     * @param array $with
     * @return Product
     */
    public function find($id, array $with = []);

    /**
     * Returns the highest product number.
     *
     * @return string
     */
    public function getHighestProductNumber();

    /**
     * Queries the product catalogue and returns a paginated result.
     *
     * @param null|string $q
     * @return LengthAwarePaginator
     */
    public function query($q = null);

    /**
     * Stores a product.
     *
     * @param Product $product
     * @param array $attributes
     * @return bool
     */
    public function save(Product $product, array $attributes = []);
}
