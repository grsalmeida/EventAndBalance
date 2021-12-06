<?php

namespace App\Adapter\Event;

class Wallet
{
    public $id;

    public $balance;

    public function __construct(string $id, int $amount)
    {
        $this->id = $id;
        $this->balance = $amount;
    }
}
