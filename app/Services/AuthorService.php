<?php

namespace App\Services;

use App\Interfaces\AuthorRepositoryInterface;
use App\Models\Author;
use Illuminate\Support\Collection;

class AuthorService
{    protected AuthorRepositoryInterface $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }
    public function getAllAuthors(): Collection
    {
        return $this->authorRepository->all();
    }
    public function findAuthor(int $id): ?Author
    {
        return $this->authorRepository->find($id);
    }

    public function createAuthor(array $data): Author
    {
        return $this->authorRepository->create($data);
    }

    public function updateAuthor(int $id, array $data): bool
    {
        return $this->authorRepository->update($id, $data);
    }

    public function deleteAuthor(int $id): bool
    {
        return $this->authorRepository->delete($id);
    }
}

