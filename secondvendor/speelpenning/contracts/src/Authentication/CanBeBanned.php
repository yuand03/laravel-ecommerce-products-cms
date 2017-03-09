<?php

namespace Speelpenning\Contracts\Authentication;

use Carbon\Carbon;

interface CanBeBanned
{
    /**
     * Indicates whether the user is banned.
     *
     * @return bool
     */
    public function isBanned();

    /**
     * Indicates from what moment the user is banned.
     *
     * @return Carbon
     */
    public function isBannedSince();

    /**
     * Get the column name for the "banned since" timestamp.
     *
     * @return string
     */
    public function getBannedAtColumnName();

    /**
     * Bans the user.
     *
     * @return void
     */
    public function ban();

    /**
     * Unbans the user.
     *
     * @return void
     */
    public function unban();
}
