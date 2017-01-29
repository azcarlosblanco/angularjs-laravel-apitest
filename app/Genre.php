<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    public $timestamps = true;

    protected $fillable = ['name'];

    public function book() {
        return $this->belongsTo(Book::class,'genre_id');
    }
}
