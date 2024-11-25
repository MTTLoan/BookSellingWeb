<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsReceipt extends Model
{
    use HasFactory;
    protected $table = 'goods_receipts';
    protected $fillable = [
        'import_date',
        'status',
        'total_quantity',
        'total_price',
        'branch_id',
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class); 
    }

    public function goods_receipt_details() {
        return  $this->hasMany(GoodsReceiptDetails::class, 'goods_receipt_id');
    }
}