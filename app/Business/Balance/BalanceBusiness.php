<?php

namespace App\Business\Balance;

use App\Adapter\Balance\BalanceResource;
use App\Adapter\Balance\BalanceResponse;
use App\Repository\Factory\FactoryBalanceRepository;

class BalanceBusiness
{

    /** @var FactoryBalanceRepository $factory */
    public $factory;

    public function __construct(FactoryBalanceRepository $factory)
    {
        $this->factory = $factory->repository('session');
    }

    public function find(BalanceResource $balance) : BalanceResponse
    {
        return new BalanceResponse(
            $this->factory->find(
                $balance->account_id
            )
        );
    }
}
