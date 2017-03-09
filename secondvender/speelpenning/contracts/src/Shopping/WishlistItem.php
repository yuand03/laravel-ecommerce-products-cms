<?php

namespace Speelpenning\Contracts\Shopping;

use Speelpenning\Contracts\Authentication\User;
use Speelpenning\Contracts\Products\Product;

interface WishlistItem
{
    /**
     * Instantiates a new wishlist item.
     *
     * @param $user
     * @param Product $product
     * @return WishlistItem
     */
    public static function instantiate(User $user, Product $product);
}
