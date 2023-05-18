<?php

declare(strict_types=1);

namespace Ranking\Support\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait
{
    public function response(string $message, mixed $data = '', int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'message'       =>  $message,
            'data'          =>  $data,
        ], $code);
    }
}
