<?php

namespace App\Repository\Interfaces;

interface IBalanceRepository
{
    public function find(int $account_id);
}
