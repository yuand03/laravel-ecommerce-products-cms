<?php

namespace Speelpenning\Contracts\Authentication\Repositories;

use Speelpenning\Contracts\Authentication\ExpirableToken;

interface PasswordResetRepository
{
    /**
     * Checks if a certain password reset exists.
     *
     * @param string $token
     * @return bool
     */
    public function exists($token);

    /**
     * Finds a password reset by e-mail address and token.
     *
     * @param string $email
     * @param string $token
     * @return ExpirableToken
     */
    public function findByEmailAndToken($email, $token);

    /**
     * Saves a password reset in the database.
     *
     * @param ExpirableToken $passwordReset
     * @return bool
     */
    public function save(ExpirableToken $passwordReset);

    /**
     * Deletes the password resets for a certain e-mail address.
     *
     * @param string $email
     * @return int
     */
    public function cleanUp($email);
}
