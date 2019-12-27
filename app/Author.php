<?php

namespace App;

use App\Book;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['name','age','address'];

    public function books() 
    {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }
}
