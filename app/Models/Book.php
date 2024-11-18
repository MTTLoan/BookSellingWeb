<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'quantity',
        'unit_price',
        'expense',
        'publishing_year',
        'page_number',
        'cover',
        'book_title_id',
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'publishing_year' => 'integer',
    ];

    public function bookTitle()
    {
        return $this->belongsTo(BookTitle::class, 'book_title_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'book_id');
    }

    public function goodsReceipt() {
        return $this->belongsToMany(GoodsReceipt::class, 'goods_receipt_details', 'book_id', 'goods_receipt_detail_id')
            ->withPivot(['quantity', 'price']);
    }

    public function carts()  {
        return $this->hasMany(Cart::class, 'book_id');
    }

    public function branches() {
        return $this->belongsToMany(Branch::class, 'books_branches', 'book_id', 'branch_id')
            ->with('quantity');
    }
    
}