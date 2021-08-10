<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function authors()
    {
        return $this->belongsToMany(Authors::class, BookAuthor::class, 'book_id', 'author_id');
    }
}
