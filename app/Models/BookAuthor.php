<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BookAuthor
 *
 * @property int $id
 * @property string $name
 * @method static Builder|BookAuthor newModelQuery()
 * @method static Builder|BookAuthor newQuery()
 * @method static Builder|BookAuthor query()
 * @method static Builder|BookAuthor whereId($value)
 * @method static Builder|BookAuthor whereName($value)
 * @mixin Eloquent
 */
class BookAuthor extends Model
{
    use HasFactory;

    protected $table = 'book_authors';

    public $timestamps = false;
}
