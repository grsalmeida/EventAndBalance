<?php

namespace App\Repository\Session;

use App\Adapter\Event\EventResource;
use App\Repository\Interfaces\IEventRepository;
use Illuminate\Support\Facades\Redis;

class SessionEvent implements IEventRepository
{

    public function createTransfer(EventResource $event)
    {
        Redis::set($event->destination, $event->amount_destination);
        Redis::set($event->origin, $event->amount_origin);
    }

    public function createDeposit(EventResource $event): void
    {
        Redis::set($event->destination, $event->amount);
    }

    public function createWithdraw(EventResource $event)
    {
        Redis::set($event->origin, $event->amount);
    }
}
