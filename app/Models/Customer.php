<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'customers';
    protected $fillable = [
        'name',
        'birthday',
        'address',
        'ward',
        'district',
        'province',
        'sex',
        'phone_number',
        'total_revenue',
        'user_id' // Khoá ngoại đến bảng User
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function order() {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function cart() {
        return $this->hasMany(Cart::class, 'customer_id');
    }

}
