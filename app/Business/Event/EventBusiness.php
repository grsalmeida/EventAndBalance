<?php

namespace App\Business\Event;


use App\Adapter\Event\EventResource;
use App\Adapter\Event\EventResponse;
use App\Repository\Factory\FactoryBalanceRepository;
use App\Repository\Factory\FactoryEventRepository;
use InvalidArgumentException;

class EventBusiness
{
    private const TRANSFER = 'transfer';
    private const WITHDRAW = 'withdraw';
    private const DEPOSIT = 'deposit';

    /** @var FactoryEventRepository $factory */
    public $factory;

    /** @var FactoryBalanceRepository $factoryBalance */
    public $factoryBalance;

    public function __construct(
        FactoryEventRepository $factory,
        FactoryBalanceRepository $factoryBalance
    )
    {
        $this->factory = $factory->repository('session');
        $this->factoryBalance = $factoryBalance->repository('session');
    }

    public function create(EventResource $event)
    {
        switch ($event->type) {
            case Self::DEPOSIT:
                return EventResponse::deposit(
                    $this->depositAmount(
                        $event
                    )
                );
            case Self::TRANSFER:
                return EventResponse::transfer(
                    $this->transferAmount(
                        $event
                    )
                );
            case Self::WITHDRAW:
                return EventResponse::withdraw(
                    $this->withdrawAmount(
                        $event
                    )
                );
            default:
                throw new InvalidArgumentException("Invalid financial operation");
        }
    }

    private function transferAmount(EventResource $event)
    {
        $amount =  $this->factoryBalance->find($event->origin);
        if($amount == 0){
            return null;
        }

        $event->amount_origin = $amount - $event->amount;

        $amount =  $this->factoryBalance->find($event->destination);
        $event->amount_destination = $amount + $event->amount;
        $this->factory->createTransfer($event);
        return $event;
    }

    private function depositAmount(EventResource $event)
    {
        $amount =  $this->factoryBalance->find($event->destination);
        $event->amount += $amount;
        $this->factory->createDeposit($event);
        return $event;
    }

    private function withdrawAmount(EventResource $event)
    {
        $amount =  $this->factoryBalance->find($event->origin);
        if($amount != 0){
            $event->amount = $amount - $event->amount;
            $this->factory->createWithdraw($event);
            return $event;
        }
        return null;
    }
}
