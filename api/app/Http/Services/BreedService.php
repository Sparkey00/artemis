<?php

namespace App\Http\Services;

class BreedService
{
    /**
     * @var mixed|string
     */
    private mixed $favBreed;

    public function __construct($favBreed = 'corgi')
    {
        $this->favBreed = $favBreed;
    }

    public function getFavBreed()
    {
        return $this->favBreed;
    }
}
