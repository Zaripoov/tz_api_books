<?php

namespace App\Http\Controllers\Api\V1\Book;

use App\Http\Controllers\Api\V1\ApiController;
use Illuminate\Http\JsonResponse;

class AuthorController extends ApiController
{
    public function list(): JsonResponse
    {
        return $this->responseSuccess();
    }

}
