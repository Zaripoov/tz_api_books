<?php

namespace App\Services\BookAuthor;

use App\Http\Resources\Api\V1\Author\AuthorByBookResource;
use App\Http\Resources\Api\V1\Book\BookResource;
use App\Models\Book;
use App\Models\BookAuthor;
use Illuminate\Support\Facades\DB;

class GetAuthorService
{
    public static function top100ByPagination(int $limit = 15): array
    {
        $paginate = BookAuthor::query()
            ->withCount('books')
            ->orderBy('books_count', 'desc')
            ->limit(100)
            ->cursorPaginate($limit);

        $items = [];

        foreach ($paginate->items() as $item) {

            $items[] = new AuthorByBookResource($item);
        }

        return [
            'items' => $items,
            'paginate' => [
                'count' => $paginate->count(),
                'hasPages' => $paginate->hasPages(),
                'nextCursor' => $paginate->nextCursor()?->encode(),
                'previousCursor' => $paginate->previousCursor()?->encode(),
                'perPage' => $paginate->perPage(),
            ]
        ];
    }

    public static function searchByName($request): array
    {
        $authors = BookAuthor::query()
            ->filter($request->toArray())
            ->get()
            ->keyBy('id')
            ->toArray();


        $books = Book::query()->whereIn( column: 'author_id',values: array_keys($authors))->cursorPaginate();

        $items = [];

        foreach ($books->items() as $item) {

            $items[] = new BookResource($item);
        }

        return [
            'search' => $request->getName(),
            'items' => $items,
            'paginate' => [
                'count' => $books->count(),
                'hasPages' => $books->hasPages(),
                'nextCursor' => $books->nextCursor()?->encode(),
                'previousCursor' => $books->previousCursor()?->encode(),
                'perPage' => $books->perPage(),
            ]
        ];
    }

}
