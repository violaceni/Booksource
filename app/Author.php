<?php

namespace App;

use App\Book;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['name', 'age', 'address'];

    public function books()
    {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }

    public static function checkDuplicateAuthor($name, $age, $address)
    {

        $authorDuplicateCheck = Author::where('name', $name)
            ->where('age', $age)
            ->where('address', $address)
            ->get();
        return $authorDuplicateCheck;
    }

    public static function prepareData(array $request){
        
        $author_data = [];
        $author_data['name'] = $request['name'];
        $author_data['address'] = $request['address'];
        $author_data['age'] = $request['age'];

        return $author_data;
    }
}
