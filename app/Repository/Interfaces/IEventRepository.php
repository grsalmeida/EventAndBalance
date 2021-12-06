<?php

namespace App\Repository\Interfaces;

use App\Adapter\Event\EventResource;

interface IEventRepository
{
    public function createTransfer(EventResource $event);

    public function createDeposit(EventResource $event);

    public function createWithdraw(EventResource $event);
}
