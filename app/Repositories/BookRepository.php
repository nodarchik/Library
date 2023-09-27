<?php

namespace App\Repositories;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookRepository implements BookRepositoryInterface
{
    /**
     * Get all books.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return Book::all();
    }

    /**
     * Find a book by its ID.
     *
     * @param int $id
     * @return Book|null
     */
    public function find(int $id): ?Book
    {
        return Book::find($id);
    }

    /**
     * Create a new book.
     *
     * @param array $data
     * @return Book
     */
    public function create(array $data): Book
    {
        return Book::create($data);
    }

    /**
     * Update an existing book.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        $book = $this->find($id);
        return $book && $book->update($data);
    }

    /**
     * Delete a book by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $book = $this->find($id);
        return $book ? $book->delete() : false;
    }

    /**
     * Search books by author name.
     *
     * @param string $author
     * @return Collection
     */
    public function searchByAuthor(string $author): Collection
    {
        return Book::whereHas('authors', function ($query) use ($author) {
            $query->where('name', 'like', "%$author%");
        })->get();
    }

    /**
     * Search books by book name.
     *
     * @param string $name
     * @return Collection
     */
    public function searchByName(string $name): Collection
    {
        return Book::where('name', 'like', "%$name%")->get();
    }
}
