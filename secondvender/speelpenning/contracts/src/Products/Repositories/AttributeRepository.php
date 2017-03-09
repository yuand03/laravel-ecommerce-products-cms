<?php

namespace Speelpenning\Contracts\Products\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Speelpenning\Contracts\Products\Attribute;
use Speelpenning\Contracts\Products\ProductType;

interface AttributeRepository
{
    /**
     * Removes the attribute from the repository.
     *
     * @param Attribute $attribute
     * @return bool
     */
    public function destroy(Attribute $attribute);

    /**
     * Finds an attribute by id.
     *
     * @param string $id
     * @return Attribute
     */
    public function find($id);

    /**
     * Relates attributes to a product type.
     *
     * @param ProductType $productType
     * @param int|array $attributeIds
     * @param array $requiredAttributes
     * @return array
     */
    public function syncWithProductType(ProductType $productType, $attributeIds, array $requiredAttributes = []);

    /**
     * Returns a collection of attributes that belongs to the given product type.
     *
     * @param ProductType $productType
     * @return Collection
     */
    public function getByProductType(ProductType $productType);

    /**
     * Returns a collection of all attributes.
     *
     * @return Collection
     */
    public function all();

    /**
     * Returns a collection of attributes matching the query.
     *
     * @param string|null $q
     * @return LengthAwarePaginator
     */
    public function query($q = null);

    /**
     * Stores an attribute.
     *
     * @param Attribute $attribute
     * @return bool
     */
    public function save(Attribute $attribute);
}
