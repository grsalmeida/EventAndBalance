<?php

namespace App\Http\Controllers;

use App\Adapter\Balance\BalanceResource;
use App\Adapter\Event\EventResource;
use App\Business\Event\EventBusiness;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    /** @var EventBusiness $event*/
    private $event;

    public function __construct(EventBusiness $event)
    {
        $this->event = $event;
    }

    public function create(Request $request): JsonResponse
    {

        $parameter = $request->all();

        $validator = Validator::make($parameter, [
            'type' => 'required|String',
            'amount' => 'required|int',
            'destination' => 'int',
            'origin' => 'int',
        ]);

        if ($validator->fails()) {
            return response()->json([], Response::HTTP_BAD_REQUEST);
        }
        $event = $this->event->create(
            new EventResource(
                $parameter['type'],
                isset($parameter['destination']) ? $parameter['destination'] : null,
                $parameter['amount'],
                isset($parameter['origin']) ? $parameter['origin'] : null
            )
        );
        if(isset($event) && !empty($event)){
            return response()->json(
                $event,
                Response::HTTP_CREATED
            );
        }
        return response()->json(
            $event,
            Response::HTTP_NOT_FOUND
        );
    }
}
