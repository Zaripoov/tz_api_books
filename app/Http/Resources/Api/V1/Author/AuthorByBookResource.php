<?php

namespace App\Http\Resources\Api\V1\Author;

use App\Models\Book;
use App\Models\BookAuthor;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin BookAuthor
 */
class AuthorByBookResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'author_name' => $this->name,
            'books' => $this->getBooks(),
        ];
    }

    private function getBooks(): array
    {
        $items = [];
        foreach ($this->books as $item)
        {
            /** @var $item Book */
            $items[] = [
                'isbn' => $item->isbn,
                'title' => $item->title,
                'year' => $item->year,
                'crated_at' => $item->created_at,
            ];
        }

        return $items;
    }
}
