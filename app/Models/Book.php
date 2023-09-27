<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static Builder|Book find(int $id)
 * @method static Builder|Book where(string $column, mixed $operator, mixed $value = null)
 * @method static Builder|Book whereHas(string $relation, \Closure $callback)
 * @method static Builder|Book create(array $attributes = [])
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_issue',
        'status',
    ];

    /**
     * @return BelongsToMany
     */
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'author_book');
    }
}
