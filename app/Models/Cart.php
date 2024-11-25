<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = ['customer_id', 'book_id', 'quantity'];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}