<?php

namespace App\Services\BookAuthor;

use App\Models\BookAuthor;

class GetAuthorService
{
    public static function top100ByPagination(int $limit = 15)
    {
        $authors = BookAuthor::query()->get();

        return $authors;
    }

}
