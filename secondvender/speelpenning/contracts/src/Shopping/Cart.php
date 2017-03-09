<?php

namespace Speelpenning\Contracts\Shopping;

use Speelpenning\Contracts\Authentication\User;

interface Cart
{
    /**
     * Instantiates a new cart for the given user.
     *
     * @param User $user
     * @return bool
     */
    public static function instantiate(User $user);
}
