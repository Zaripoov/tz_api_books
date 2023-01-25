<?php

namespace App\Http\Controllers\Api\V1\Book;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Requests\Api\V1\Book\BookListRequest;
use App\Services\Book\GetBookService;
use Illuminate\Http\JsonResponse;

class BookController extends ApiController
{
    public function list(BookListRequest $request): JsonResponse
    {
        return $this->responseSuccess([GetBookService::get($request)]);
    }

}
