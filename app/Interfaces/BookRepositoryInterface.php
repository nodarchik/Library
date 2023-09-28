<?php
namespace App\Interfaces;

use App\Models\Book;
use Illuminate\Support\Collection;

/**
 * Interface BookRepositoryInterface
 *
 * Repository interface for handling operations related to the Book model.
 *
 * @package App\Interfaces
 */
interface BookRepositoryInterface
{
    /**
     * Retrieve all books.
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Find a book by its ID.
     *
     * @param int $id The ID of the book.
     * @return Book|null The book, or null if not found.
     */
    public function find(int $id): ?Book;

    /**
     * Create a new book with the given data.
     *
     * @param array $data The data for the new book.
     * @return Book The newly created book.
     */
    public function create(array $data): Book;

    /**
     * Update the book identified by the given ID with the new data.
     *
     * @param int $id The ID of the book to update.
     * @param array $data The new data for the book.
     * @return bool True on success, false otherwise.
     */
    public function update(int $id, array $data): bool;

    /**
     * Delete the book identified by the given ID.
     *
     * @param int $id The ID of the book to delete.
     * @return bool True on success, false otherwise.
     */
    public function delete(int $id): bool;

    /**
     * Search books by author.
     *
     * @param string $author The name of the author.
     * @return Collection A collection of books by the given author.
     */
    public function searchByAuthor(string $author): Collection;

    /**
     * Search books by name.
     *
     * @param string $name The name of the book.
     * @return Collection A collection of books with the given name.
     */
    public function searchByName(string $name): Collection;
}
