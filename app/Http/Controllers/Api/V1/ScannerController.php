<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\Scanner\ScannerCreateRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class ScannerController extends ApiController
{
    public function create(ScannerCreateRequest $request): JsonResponse
    {
        return $this->responseSuccess();

    }

}
