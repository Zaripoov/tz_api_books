<?php

namespace App\Services\Book;

use App\Http\Resources\Api\V1\Book\BookResource;
use App\Models\Book;

class GetBookService
{

    public static function get($request): array
    {
        $query = Book::query()
            ->filter($request->toArray())
            ->cursorPaginate();

        $items = [];

        foreach ($query->items() as $item) {

            $items[] = new BookResource($item);
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
