<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTitle extends Model
{
    use HasFactory;

    protected $table = 'booktitles';

    protected $fillable = [
        'name',
        'author',
        'description',
        'book_type_id',
        'supplier_id',
    ];

    protected $guarded = ['id'];

    public function books()
    {
        return $this->hasMany(Book::class, 'book_title_id');
    }

    public function bookTypes()
    {
        return $this->belongsTo(BookType::class, 'book_type_id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}