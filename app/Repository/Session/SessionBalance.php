<?php

namespace App\Repository\Session;

use App\Exceptions\NotFoundException;
use App\Repository\Interfaces\IBalanceRepository;



class SessionBalance implements IBalanceRepository
{
    /** @var Session $session  */
    public $session;

    public function __construct()
    {
        $this->session = Session();
    }
    public function find($account_id)
    {
        if ($this->session->has((string)$account_id)) {
            return $this->session->get((string)$account_id, 0);
        }
        throw new NotFoundException(0, 404); ;
    }
}
