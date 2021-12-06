<?php

namespace App\Repository\Session;
use App\Repository\Interfaces\IBalanceRepository;
use Illuminate\Support\Facades\Redis;

class SessionBalance implements IBalanceRepository
{
    public function find($account_id)
    {
        $amount = Redis::get($account_id);
        if (isset($amount) && !empty($amount)) {
            return $amount;
        }
        return 0;
    }
}
