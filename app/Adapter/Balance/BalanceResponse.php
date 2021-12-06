<?php

namespace App\Adapter\Balance;

class BalanceResponse
{
    public $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }
}
