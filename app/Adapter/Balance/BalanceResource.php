<?php

namespace App\Adapter\Balance;

use Illuminate\Http\Request;

class BalanceResource
{
    public $account_id;

    public function __construct(int $account_id)
    {
        $this->account_id =  $account_id;
    }
}
