<?php

namespace App\Services\BookAuthor;

use App\Http\Resources\Api\V1\Author\AuthorByBookResource;
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
        $query = BookAuthor::query()
            ->filter($request->toArray())
            ->cursorPaginate();

        $items = [];

        foreach ($query->items() as $item) {

            $items[] = new AuthorByBookResource($item);
        }

        return [
            'items' => $items,
            'paginate' => [
                'count' => $query->count(),
                'hasPages' => $query->hasPages(),
                'nextCursor' => $query->nextCursor()?->encode(),
                'previousCursor' => $query->previousCursor()?->encode(),
                'perPage' => $query->perPage(),
            ]
        ];
    }

}
