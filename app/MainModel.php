<?php

namespace App;

use App\Book;
use App\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;

class MainModel extends Model
{

    public static function checkDuplicates(int $authorDuplicateRecord, int $bookDuplicateRecord, object $authorDuplicateCheck, object $bookDuplicateCheck, array $author_data, array $book_data)
    {
        
        switch (true) {
            case ($authorDuplicateRecord == 0 and $bookDuplicateRecord == 0):

                $author = Author::create($author_data);
                $book = Book::create($book_data);
                $author->books()->attach($book->id);

                return Redirect::to('booksource/index')->with('message', 'Records successfully saved');
                break;

            case ($authorDuplicateRecord > 0 && $bookDuplicateRecord == 0):

                $author_id = $authorDuplicateCheck[0]->id;
                $author = Author::find($author_id);
                $book = Book::create($book_data);
                $author->books()->attach($book->id);

                return Redirect::to('booksource/index')->with('message', ' Book record successfully saved');
                break;
            case ($authorDuplicateRecord == 0 && $bookDuplicateRecord > 0):
                $book_id = $bookDuplicateCheck[0]->id;
                $author = Author::create($author_data);
                $author->books()->attach($book_id);

                return Redirect::to('booksource/index')->with('message', 'Author record successfully saved');
                break;
            case ($authorDuplicateRecord > 0 && $bookDuplicateRecord > 0):

                return Redirect::back()->withErrors("This author and this book exists")->withInput();
                break;

            default:
                return Redirect::to('booksource/index');
                break;
        }

    }
}
