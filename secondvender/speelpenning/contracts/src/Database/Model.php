<?php

namespace Speelpenning\Contracts\Database;

interface Model
{
    /**
     * Fill the model with an array of attributes.
     *
     * @param array $attributes
     * @return $this
     */
    public function fill(array $attributes);
}
