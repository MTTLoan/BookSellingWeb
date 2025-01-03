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
        'start_date',
        'end_date',
        'value',
        'starting_price',
        'made_by',
    ];

    public function order() {
        return $this->hasMany(Order::class, '');
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'branches_discounts', 'discount_id', 'branch_id');
    }
}
