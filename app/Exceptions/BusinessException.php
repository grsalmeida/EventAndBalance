<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Interface BusinessException
 * Agrupa todas as exceptions de negócio que possuem uma renderização personalizada
 *
 * @package App\Exceptions
 */
abstract class BusinessException extends Exception
{
    /**
     * Renderiza o response de forma personalizada conforme o tipo da exception
     *
     * @param $request
     *
     * @return JsonResponse
     */
    abstract public function render($request): JsonResponse;
}
