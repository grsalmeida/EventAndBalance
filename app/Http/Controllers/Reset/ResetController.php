<?php

namespace App\Http\Controllers;

use App\Adapter\Event\EventResource;
use App\Business\Event\ResetBusiness;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResetController extends Controller
{
    /** @var ResetBusiness $event*/
    private $event;

    public function __construct(ResetBusiness $event)
    {
        $this->event = $event;
    }

    public function reset(): Response
    {
        $this->event->reset();

        return response(
            'OK',
            Response::HTTP_OK

        );
    }
}
