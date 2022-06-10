<?php

namespace App\Http\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function findByPK($id);
    public function search(array $params = []);
}
