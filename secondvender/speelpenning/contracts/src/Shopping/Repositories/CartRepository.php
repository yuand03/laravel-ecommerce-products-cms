<?php

namespace Speelpenning\Contracts\Shopping\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Speelpenning\Contracts\Shopping\Cart;

interface CartRepository
{
    /**
     * Finds a cart by id.
     *
     * @param int $id
     * @return Cart
     */
    public function find($id);

    /**
     * Queries the carts.
     *
     * @param string $q
     * @return LengthAwarePaginator
     */
    public function query($q);

    /**
     * Stores a cart.
     *
     * @param Cart $cart
     * @return bool
     */
    public function save(Cart $cart);
}
