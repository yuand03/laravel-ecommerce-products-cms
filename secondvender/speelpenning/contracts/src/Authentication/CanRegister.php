<?php

namespace Speelpenning\Contracts\Authentication;

interface CanRegister
{
    /**
     * Registers a new user.
     *
     * @param null|string $name
     * @param string $email
     * @param string $password
     * @return CanRegister
     */
    public static function register($name = null, $email, $password);
}
