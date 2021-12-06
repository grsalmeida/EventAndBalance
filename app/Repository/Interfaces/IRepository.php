<?php

namespace App\Repository\Interfaces;

interface IRepository
{
    public function create();

    public function find(int $account_id);
}
