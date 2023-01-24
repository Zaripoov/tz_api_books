<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function responseSuccess(?array $data=[]): JsonResponse
    {
        return response()->json([
            'state' => 0,
            'result' => $data,
        ]);
    }

}
