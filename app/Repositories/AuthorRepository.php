<?php

namespace App\Repositories;

use App\Interfaces\AuthorRepositoryInterface;
use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class AuthorRepository
 * @package App\Repositories
 */
class AuthorRepository implements AuthorRepositoryInterface
{
    /**
     * Get all authors.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return Author::all();
    }

    /**
     * Find an author by ID.
     *
     * @param int $id
     * @return Author|null
     */
    public function find(int $id): ?Author
    {
        return Author::find($id);
    }

    /**
     * Create a new author.
     *
     * @param array $data
     * @return Author
     */
    public function create(array $data): Author
    {
        return Author::create($data);
    }

    /**
     * Update an existing author.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        $author = $this->find($id);
        return $author && $author->update($data);
    }

    /**
     * Delete an author.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $author = $this->find($id);
        return $author ? $author->delete() : false;
    }
}
