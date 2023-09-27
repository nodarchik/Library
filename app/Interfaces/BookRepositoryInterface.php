<?php

namespace App\Interfaces;

use App\Models\Book;
use Illuminate\Support\Collection;

interface BookRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?Book;

    public function create(array $data): Book;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function searchByAuthor(string $author): Collection;

    public function searchByName(string $name): Collection;
}
