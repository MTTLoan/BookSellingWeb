<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBranch extends Model
{
    use HasFactory;

    protected $table = 'books_branches';

    protected $fillable = [
        'book_id',
        'branch_id',
        'quantity',
    ];

    protected $guarded = ['id'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}