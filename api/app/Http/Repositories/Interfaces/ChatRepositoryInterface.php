<?php

namespace App\Http\Repositories\Interfaces;

interface ChatRepositoryInterface
{
    public function findByUserId(int $userId);
}
