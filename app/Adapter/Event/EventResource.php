<?php

namespace App\Adapter\Event;

class EventResource
{
    public $type;

    public $destination;

    public $amount;

    public $origin;

    public function __construct(string $type, ?int $destination = null, int $amount, ?int $origin = null)
    {
        $this->type =  $type;
        $this->destination =  $destination;
        $this->amount =  $amount;
        $this->origin =  $origin;
    }
}
