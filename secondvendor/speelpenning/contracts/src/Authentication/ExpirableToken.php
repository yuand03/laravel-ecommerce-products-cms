<?php

namespace Speelpenning\Contracts\Authentication;

use Illuminate\Contracts\Auth\Authenticatable;
use Speelpenning\Contracts\DateAndTime\CanExpire;

interface ExpirableToken extends CanExpire
{
    /**
     * Generates a new password token.
     *
     * @param Authenticatable $user
     * @return ExpirableToken
     */
    public static function generate(Authenticatable $user);

    /**
     * Returns the reset token.
     *
     * @return string
     */
    public function getToken();
}
