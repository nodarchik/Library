<?php

namespace App\Interfaces;

use App\Models\Author;
use Illuminate\Support\Collection;

/**
 * Interface AuthorRepositoryInterface
 *
 * Repository interface for handling operations related to the Author model.
 *
 * @package App\Interfaces
 */
interface AuthorRepositoryInterface
{
    /**
     * Retrieve all authors.
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Find an author by its ID.
     *
     * @param int $id The ID of the author.
     * @return Author|null The author, or null if not found.
     */
    public function find(int $id): ?Author;

    /**
     * Create a new author with the given data.
     *
     * @param array $data The data for the new author.
     * @return Author The newly created author.
     */
    public function create(array $data): Author;

    /**
     * Update the author identified by the given ID with the new data.
     *
     * @param int $id The ID of the author to update.
     * @param array $data The new data for the author.
     * @return bool True on success, false otherwise.
     */
    public function update(int $id, array $data): bool;

    /**
     * Delete the author identified by the given ID.
     *
     * @param int $id The ID of the author to delete.
     * @return bool True on success, false otherwise.
     */
    public function delete(int $id): bool;
}
