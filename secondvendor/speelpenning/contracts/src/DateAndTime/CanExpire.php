<?php

namespace Speelpenning\Contracts\DateAndTime;

interface CanExpire
{
    /**
     * The moment at which the object expires.
     *
     * @return \DateTime
     */
    public function expiresAt();

    /**
     * Checks if the object has expired.
     *
     * @return bool
     */
    public function isExpired();
}
