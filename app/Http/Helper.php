<?php

namespace App\Http;
use Illuminate\Http\JsonResponse;

trait Helper{
    public function success($user, $message = "success") : JsonResponse {
        return response()->json([
            'code' => 200,
            'message' => $message,
            'data' =>$user
        ]);
    }

    public function error($message): JsonResponse {
        return response()->json([
            'code' => 400,
            'message' => $message
        ], 400);
    }
}
