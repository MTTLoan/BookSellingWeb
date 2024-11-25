<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    use HasFactory;

    protected $table = 'booktypes';

    protected $fillable = [
        'name',
        'quantity',
        'category',
    ];

    protected $guarded = ['id'];

    public function bookTitles()
    {
        return $this->hasMany(BookTitle::class, 'book_type_id');
    }
}