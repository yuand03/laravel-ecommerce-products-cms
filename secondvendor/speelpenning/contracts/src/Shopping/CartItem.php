<?php

namespace Speelpenning\Contracts\Shopping;

use Speelpenning\Contracts\Authentication\User;
use Speelpenning\Contracts\Products\Product;

interface CartItem
{
    /**
     * Instantiates a new cart item.
     *
     * @param User $user
     * @param Product $product
     * @param int $number
     * @return CartItem
     */
    public static function instantiate(User $user, Product $product, $number = 1);
}
