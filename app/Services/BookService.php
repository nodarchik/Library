<?php

namespace App\Services;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Class BookService
 * @package App\Services
 */
class BookService
{
    /**
     * @var BookRepositoryInterface
     */
    protected BookRepositoryInterface $bookRepository;

    /**
     * BookService constructor.
     *
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Get all books.
     *
     * @return Collection
     */
    public function getAllBooks(): Collection
    {
        return $this->bookRepository->all();
    }

    /**
     * Create a new book.
     *
     * @param array $data
     * @return Book
     */
    public function createBook(array $data): Book
    {
        return $this->bookRepository->create($data);
    }

    /**
     * Find a book by ID.
     *
     * @param int $id
     * @return Book|null
     */
    public function findBook(int $id): ?Book
    {
        return $this->bookRepository->find($id);
    }

    /**
     * Update an existing book.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateBook(int $id, array $data): bool
    {
        return $this->bookRepository->update($id, $data);
    }

    /**
     * Delete a book.
     *
     * @param int $id
     * @return bool
     */
    public function deleteBook(int $id): bool
    {
        return $this->bookRepository->delete($id);
    }

    /**
     * Get the query builder for all books.
     *
     * @return Builder
     */
    public function getAllBooksQueryBuilder(): Builder
    {
        return Book::query();
    }

    /**
     * Search books by name or author name.
     *
     * @param string|null $title
     * @param string|null $author
     * @return Builder
     */
    public function searchBooks(?string $title, ?string $author): Builder
    {
        return Book::query()
            ->when($title, function ($query, $title) {
                return $query->where('name', 'like', "%$title%");
            })
            ->when($author, function ($query, $author) {
                return $query->whereHas('authors', function ($query) use ($author) {
                    $query->where('name', 'like', "%$author%");
                });
            });
    }
}
