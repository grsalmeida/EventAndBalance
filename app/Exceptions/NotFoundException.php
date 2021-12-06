<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;

class NotFoundException extends BusinessException
{
    public function render($request): JsonResponse
    {
        return response()->json($this->getMessage(), 404);
    }
}
