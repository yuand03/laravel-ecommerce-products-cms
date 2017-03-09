<?php

namespace Speelpenning\Contracts\Products;

use Illuminate\Contracts\Validation\ValidationException;

interface ProductNumber
{
    /**
     * Create a new product number instance.
     *
     * @param string $productNumber
     */
    public function __construct($productNumber);

    /**
     * Indicates if the product number should increment automatically.
     *
     * @return bool
     */
    public function autoIncrements();

    /**
     * Returns the first usable product number.
     *
     * @return ProductNumber
     */
    public static function first();

    /**
     * Returns the length that a product number must have.
     *
     * @return int
     */
    public function length();

    /**
     * Returns an instance with the next unused product number.
     *
     * @return ProductNumber|null
     */
    public function next();

    /**
     * Parses a product number and returns a product number instance.
     *
     * @param string $productNumber
     * @return ProductNumber
     * @throws ValidationException
     */
    public static function parse($productNumber);

    /**
     * Returns the string representation of the product number.
     *
     * @return string
     */
    public function __toString();
}
