<?php

namespace App\Services;

use App\Interfaces\AuthorRepositoryInterface;
use App\Models\Author;
use Illuminate\Support\Collection;

/**
 * Class AuthorService
 * @package App\Services
 */
class AuthorService
{
    /**
     * @var AuthorRepositoryInterface
     */
    protected AuthorRepositoryInterface $authorRepository;

    /**
     * AuthorService constructor.
     *
     * @param AuthorRepositoryInterface $authorRepository
     */
    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * Get all authors.
     *
     * @return Collection
     */
    public function getAllAuthors(): Collection
    {
        return $this->authorRepository->all();
    }

    /**
     * Find an author by ID.
     *
     * @param int $id
     * @return Author|null
     */
    public function findAuthor(int $id): ?Author
    {
        return $this->authorRepository->find($id);
    }

    /**
     * Create a new author.
     *
     * @param array $data
     * @return Author
     */
    public function createAuthor(array $data): Author
    {
        return $this->authorRepository->create($data);
    }

    /**
     * Update an existing author.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateAuthor(int $id, array $data): bool
    {
        return $this->authorRepository->update($id, $data);
    }

    /**
     * Delete an author.
     *
     * @param int $id
     * @return bool
     */
    public function deleteAuthor(int $id): bool
    {
        return $this->authorRepository->delete($id);
    }
}
