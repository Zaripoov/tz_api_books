<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\Scan\ScanCreateRequest;
use App\Http\Resources\Api\V1\Book\BookResource;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Services\Book\SaveBookService;
use App\Services\BookAuthor\SaveAuthorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ScanController extends ApiController
{
    /**
     * @param ScanCreateRequest $request
     * @return JsonResponse
     */
    public function create(ScanCreateRequest $request): JsonResponse
    {
        DB::beginTransaction();
        $author = (new SaveAuthorService(name: $request->getAuthorFullName()))->create();
        if ($author) {
            $book = (new SaveBookService(
                title: $request->getTitle(),
                isbn: $request->getIsbn(),
                year: $request->getYear(),
                authorId: $author->id
            ))->create();

            if ($book) {
                DB::commit();
                $resource = new BookResource($book);
                return $this->responseSuccess(data: [$resource->toArray($request)]);
            }
        }
        DB::rollBack();

        return $this->responseError(data: ['message' => 'Failed to save data']);

    }

}
