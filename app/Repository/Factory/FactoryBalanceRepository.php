<?php

namespace App\Repository\Factory;

use App\Repository\Interfaces\IBalanceRepository;
use App\Repository\Session\SessionBalance;
use InvalidArgumentException;

class FactoryBalanceRepository
{

    public const REPOSITORY_SESSION = 'session';
    public const REPOSITORY = 'model';

    public static function repository(string $type = 'model') : IBalanceRepository
    {
        switch ($type) {
            case self::REPOSITORY_SESSION:
                return new SessionBalance();
            case self::REPOSITORY:
                return false;
            default:
                throw new InvalidArgumentException("was not instantiated to model");
        }
    }
}
