<?php

namespace App\Adapter\Event;

use stdClass;

class EventResponse
{
    public $event;

    public static function deposit($event)
    {
        $destination = new stdClass();
        $destination->destination = 'destination';
        $destination->destination = new Wallet($event->destination, $event->amount);
        return $destination;
    }

    public static function transfer($event)
    {
        if (!empty($event)) {
            $transfer = new stdClass();
            $transfer->origin = 'origin';
            $transfer->origin = new Wallet($event->origin, $event->amount_origin);
            $transfer->destination = 'destination';
            $transfer->destination = new Wallet($event->destination, $event->amount_destination);
            return $transfer;
        }
        return 0;
    }

    public static function withdraw($event)
    {
        if (!empty($event)) {
            $origin = new stdClass();
            $origin->origin = 'origin';
            $origin->origin = new Wallet($event->origin, $event->amount);
            return $origin;
        }
        return 0;
    }
}
