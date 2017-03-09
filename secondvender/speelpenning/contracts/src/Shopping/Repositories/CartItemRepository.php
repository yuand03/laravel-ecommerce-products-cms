<?php

namespace Speelpenning\Contracts\Shopping\Repositories;

use Illuminate\Support\Collection;
use Speelpenning\Contracts\Authentication\User;
use Speelpenning\Contracts\Shopping\Cart;
use Speelpenning\Contracts\Shopping\CartItem;

interface CartItemRepository
{
    /**
     * Finds a cart item by id.
     *
     * @param int $id
     * @return CartItem
     */
    public function find($id);

    /**
     * Returns a collection of cart items belonging to the given cart.
     *
     * @param Cart|null $cart
     * @return Collection
     */
    public function getByCart(Cart $cart = null);

    /**
     * Returns a collection of cart items belonging to the given user.
     *
     * @param User $user
     * @return Collection
     */
    public function getByUser(User $user);
    
    /**
     * Stores a cart item.
     *
     * @param CartItem $cartItem
     * @return bool
     */
    public function save(CartItem $cartItem);
}
