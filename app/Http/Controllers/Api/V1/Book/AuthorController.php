<?php

namespace App\Http\Controllers\Api\V1\Book;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Requests\Api\V1\BookAuthor\AuthorRequest;
use App\Services\BookAuthor\AverageBookPerYearService;
use App\Services\BookAuthor\GetAuthorService;
use Illuminate\Http\JsonResponse;

class AuthorController extends ApiController
{
    public function list(): JsonResponse
    {
        return $this->responseSuccess(GetAuthorService::top100ByPagination());
    }

    public function search(AuthorRequest $request): JsonResponse
    {
        return $this->responseSuccess(GetAuthorService::searchByName($request));
    }

    public function averagePerYear(AuthorRequest $request): JsonResponse
    {
        return $this->responseSuccess(AverageBookPerYearService::averageBookPerYear($request));
    }

}
