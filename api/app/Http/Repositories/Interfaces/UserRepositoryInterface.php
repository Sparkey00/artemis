<?php

namespace App\Http\Repositories\Interfaces;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function searchMatches();
}
