<?php

namespace Speelpenning\Contracts\Authentication;

interface ManagesUsers
{
    /**
     * Indicates if managing users is allowed.
     *
     * @return bool
     */
    public function managesUsers();

    /**
     * Returns the field name of the manages users indicator.
     *
     * @return string
     */
    public function managesUsersIndicator();
}
