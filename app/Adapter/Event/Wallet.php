<?php

namespace App\Adapter\Event;

class Wallet
{
    public $id;

    public $amount;

    public function __construct(int $id, int $amount)
    {
        $this->id = $id;
        $this->amount = $amount;
    }
}
