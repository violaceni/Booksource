<?php

use App\Book;
use App\Author;
use Illuminate\Database\Seeder;

class AuthorBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::all();
        Author::all()->each(function ($author) use ($books) { 
            $author->books()->attach(
                $books->random(rand(1, 7))->pluck('id')->toArray(),
            ); 
        });
    }
}
