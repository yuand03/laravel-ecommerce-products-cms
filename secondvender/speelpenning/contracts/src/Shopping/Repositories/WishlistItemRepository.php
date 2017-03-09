<?php

namespace Speelpenning\Contracts\Shopping\Repositories;

use Illuminate\Support\Collection;
use Speelpenning\Contracts\Authentication\User;
use Speelpenning\Contracts\Shopping\WishlistItem;

interface WishlistItemRepository
{
    /**
     * Finds a wishlist item by id.
     *
     * @param int $id
     * @return WishlistItem
     */
    public function find($id);

    /**
     * Returns a collection of wishlist items related to the given user.
     *
     * @param User $user
     * @return Collection
     */
    public function getByUser(User $user);

    /**
     * Stores a wishlist item.
     *
     * @param WishlistItem $wishlistItem
     * @return bool
     */
    public function save(WishlistItem $wishlistItem);
}
