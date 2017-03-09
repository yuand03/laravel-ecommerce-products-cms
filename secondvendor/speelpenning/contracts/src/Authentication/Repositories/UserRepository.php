<?php

namespace Speelpenning\Contracts\Authentication\Repositories;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepository
{
    /**
     * Checks if a user with a specific e-mail address exists in the database.
     *
     * @param string $emailAddress
     * @return bool
     */
    public function exists($emailAddress);

    /**
     * Finds a user by id.
     *
     * @param int $id
     * @return Authenticatable
     */
    public function find($id);

    /**
     * Finds a user by e-mail address.
     *
     * @param string $emailAddress
     * @return Authenticatable
     */
    public function findByEmailAddress($emailAddress);

    /**
     * Queries the repository and returns a paginated result.
     *
     * @param null|string $q
     * @return LengthAwarePaginator
     */
    public function query($q = null);

    /**
     * Saves the model to the database.
     *
     * @param Authenticatable $model
     * @return bool
     */
    public function save(Authenticatable $model);
}
