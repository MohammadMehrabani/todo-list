<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ApiResponder
{
    public function successResponse($data = null, $statusCode = Response::HTTP_OK, $message = null)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    public function errorResponse($statusCode = Response::HTTP_INTERNAL_SERVER_ERROR, $message = null, $data = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
}
