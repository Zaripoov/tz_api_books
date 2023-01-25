<?php

namespace App\Http\Resources\Api\V1\Book;

use App\Models\Book;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Book
 */
class BookResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'isbn' => $this->isbn,
            'title' => $this->title,
            'author' => $this->author->name,
            'year' => $this->year,
            'created_at' => $this->created_at,
        ];

    }
}
