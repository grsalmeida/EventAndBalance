<?php

namespace App\Repository\Factory;

use App\Repository\Session\SessionEvent;
use InvalidArgumentException;

class FactoryEventRepository
{

    public const REPOSITORY_SESSION = 'session';
    public const REPOSITORY = 'model';

    public static function repository(string $type = 'model')
    {
        switch ($type) {
            case self::REPOSITORY_SESSION:
                return new SessionEvent();
            case self::REPOSITORY:
                return false;
            default:
                throw new InvalidArgumentException("was not instantiated to model");
        }
    }
}
