<?php

namespace App\Http\Interfaces;

interface SearchServiceInterface
{
    public function search(array $params = []);
}
