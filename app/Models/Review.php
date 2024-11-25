<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'score',
        'description',
        'order_id',
        'book_id',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}