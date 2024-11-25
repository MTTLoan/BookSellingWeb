<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'type',
        'status',
        'address',
        'ward',
        'district',
        'province',
        'date_received',
        'total_price',
        'discount_id',
        'customer_id',
        'employee_id',
    ];

    public function discount()
    {
        return $this->hasOne(Discount::class, 'discount_id'); 
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function orderDetail() {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
