<?php

namespace App;

use App\Author;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['name', 'release_date'];

    public function authors()
    {
        return $this->belongsToMany(Author::class)->withTimestamps();
    }

    public static function checkDuplicateBook($name, $releaseDate)
    {
        $bookDuplicateCheck = Book::where('name', $name)
            ->where('release_date', $releaseDate)
            ->get();
        return $bookDuplicateCheck;
    }

    public static function prepareData(array $request){
        
        $book_data = [];
        $book_data['name'] = $request['book_name'];
        $book_data['release_date'] = $request['release_date'];

        return $book_data;
    }
}
