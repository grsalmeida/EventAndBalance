<?php

namespace App\Business\Event;

use Illuminate\Support\Facades\Redis;
use InvalidArgumentException;

class ResetBusiness
{

    public function __construct()
    {
    }

    public function reset()
    {
        Redis::flushDB();
        return true;
    }
}
