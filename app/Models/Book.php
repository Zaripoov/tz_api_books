<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Book
 *
 * @property int $id
 * @property string $title
 * @property int $isbn
 * @property int $year
 * @property int $author_id
 * @method static Builder|Book newModelQuery()
 * @method static Builder|Book newQuery()
 * @method static Builder|Book query()
 * @method static Builder|Book whereAuthorId($value)
 * @method static Builder|Book whereId($value)
 * @method static Builder|Book whereIsbn($value)
 * @method static Builder|Book whereTitle($value)
 * @method static Builder|Book whereYear($value)
 * @mixin Eloquent
 */
class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
}
