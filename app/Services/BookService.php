<?php

namespace App\Services;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Support\Collection;

class BookService
{
    protected BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBooks(): Collection
    {
        return $this->bookRepository->all();
    }

    public function createBook(array $data): Book
    {
        return $this->bookRepository->create($data);
    }

    public function findBook($id): ?Book
    {
        return $this->bookRepository->find($id);
    }

    public function updateBook($id, array $data): bool
    {
        return $this->bookRepository->update($id, $data);
    }

    public function deleteBook($id): bool
    {
        return $this->bookRepository->delete($id);
    }
}
