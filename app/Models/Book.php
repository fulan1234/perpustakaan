<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_name',
        'category_name',
        'book_count',
        'description',
        'book_file',
        'book_cover',
        'slug',
        'category_id'
    ];
}
