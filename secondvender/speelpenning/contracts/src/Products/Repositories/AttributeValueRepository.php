<?php

namespace Speelpenning\Contracts\Products\Repositories;

use Illuminate\Support\Collection;
use Speelpenning\Contracts\Products\Attribute;
use Speelpenning\Contracts\Products\AttributeValue;

interface AttributeValueRepository
{
    /**
     * Removes an attribute value from the repository.
     *
     * @param AttributeValue $attributeValue
     * @return bool
     */
    public function destroy(AttributeValue $attributeValue);

    /**
     * Finds an attribute value by id.
     *
     * @param int $id
     * @return AttributeValue
     */
    public function find($id);

    /**
     * Returns a collection of attribute values belonging to a specific attribute.
     *
     * @param Attribute $attribute
     * @return Collection
     */
    public function getByAttribute(Attribute $attribute);

    /**
     * Saves an attribute value.
     *
     * @param AttributeValue $attributeValue
     * @return bool
     */
    public function save(AttributeValue $attributeValue);
}
