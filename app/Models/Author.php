<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @method static Builder|Author find(int $id)
 * @method static Builder|Author where(string $column, mixed $operator, mixed $value = null)
 * @method static Builder|Author whereHas(string $relation, \Closure $callback)
 * @method static Builder|Author create(array $attributes = [])
 */
class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * @return BelongsToMany
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'author_book');
    }
}
