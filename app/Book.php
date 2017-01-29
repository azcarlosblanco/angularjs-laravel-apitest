<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    public  $timestamps = true;

    protected $fillable = ['id', 'name', 'description', 'author_id', 'genre_id', 'publish_date'];

    public function author() {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function genre() {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
