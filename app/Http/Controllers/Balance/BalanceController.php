<?php

namespace App\Http\Controllers;

use App\Adapter\Balance\BalanceResource;
use App\Business\Balance\BalanceBusiness;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BalanceController extends Controller
{
    /** @var BalanceBusiness $balance*/
    private $balance;

    public function __construct(BalanceBusiness $balance)
    {
        $this->balance = $balance;
    }

    public function find(Request $request): JsonResponse
    {

        $parameter = $request->all();

        $validator = Validator::make($parameter, [
            'account_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(
            $this->balance->find(
                new BalanceResource(
                    $request->get('account_id')
                )
            )
        );
    }
}
