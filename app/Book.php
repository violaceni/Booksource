<?php

namespace App;

use App\Author;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['name','release_date'];

    public function authors() 
    {
        return $this->belongsToMany(Author::class)->withTimestamps();
    }
}
