<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    public  $timestamps = true;

    protected $fillable = ['name'];


    public function book(){
        return $this->hasMany(Book::class);
    }
}
