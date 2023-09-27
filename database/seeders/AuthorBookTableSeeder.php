<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorIds = Author::all()->pluck('id')->toArray();
        $bookIds = Book::all()->pluck('id')->toArray();

        foreach ($bookIds as $bookId) {
            $randomAuthorIds = array_rand($authorIds, rand(1, 3));
            if (is_array($randomAuthorIds)) {
                foreach ($randomAuthorIds as $authorId) {
                    Book::find($bookId)->authors()->attach($authorIds[$authorId]);
                }
            } else {
                Book::find($bookId)->authors()->attach($authorIds[$randomAuthorIds]);
            }
        }
    }
}
