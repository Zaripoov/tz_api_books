<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * App\Models\BookAuthor
 *
 * @property int $id
 * @property string $name
 * @property-read Collection|Book[] $books
 * @property-read int|null $books_count
 * @method static Builder|BookAuthor newModelQuery()
 * @method static Builder|BookAuthor newQuery()
 * @method static Builder|BookAuthor query()
 * @method static Builder|BookAuthor whereId($value)
 * @method static Builder|BookAuthor whereName($value)
 * @method static filter($toArray)
 * @mixin Eloquent
 */
class BookAuthor extends Model
{
    use HasFactory, Filterable;

    protected $table = 'book_authors';

    public $timestamps = false;

    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
