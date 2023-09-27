<?php

namespace App\Repositories;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookRepository implements BookRepositoryInterface
{
    public function all(): Collection
    {
        return Book::all();
    }

    public function find(int $id): ?Book
    {
        return Book::find($id);
    }

    public function create(array $data): Book
    {
        return Book::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $book = $this->find($id);
        return $book ? $book->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $book = $this->find($id);
        return $book ? $book->delete() : false;
    }

    public function searchByAuthor(string $author): Collection
    {
        return Book::whereHas('authors', function ($query) use ($author) {
            $query->where('name', 'like', "%$author%");
        })->get();
    }

    public function searchByName(string $name): Collection
    {
        return Book::where('name', 'like', "%$name%")->get();
    }
}

