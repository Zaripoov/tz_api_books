<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class BookFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function year($year): BookFilter
    {
        $year = explode(separator: '-', string:  $year);
        $yearFrom = $year[0];
        $yearTo = $year[1];

        return $this->whereBetween(column: 'year',values: [$yearFrom, $yearTo]);
    }
}
