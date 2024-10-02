<?php

namespace AM\App\Http\Interfaces;
interface PreparationInterface
{
    /**
     * @param array $args
     * @return array|null
     */
    public function prepare(array $args) : ?array;
}