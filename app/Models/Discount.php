<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';
    protected $fillable = [
        'name',
        'type',
        'code',
        'start_date',
        'end_date',
        'value',
        'starting_price',
        'made_by',
    ];

    public function order()
    {
        return $this->hasMany(Order::class, '');
    }
}
