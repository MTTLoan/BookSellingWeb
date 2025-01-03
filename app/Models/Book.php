<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'books';

    protected $fillable = [
        'quantity',
        'unit_price',
        'cost',
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

    public function goodsReceipt()
    {
        return $this->belongsToMany(GoodsReceipt::class, 'goods_receipt_details', 'book_id', 'goods_receipt_detail_id')
            ->withPivot(['quantity', 'price']);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'book_id');
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'books_branches', 'book_id', 'branch_id')
            ->with('quantity');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $original = $model->getOriginal();
            $changes = $model->getDirty();

            ChangeLog::create([
                'table_name' => $model->getTable(),
                'row_id' => $model->id,
                'old_value' => json_encode($original),
                'new_value' => json_encode($changes),
                'changed_by' => Auth::id(),
                'operation_type' => 'update',
                'changed_at' => now(),
            ]);
        });

        static::deleting(function ($model) {
            ChangeLog::create([
                'table_name' => $model->getTable(),
                'row_id' => $model->id,
                'old_value' => json_encode($model->getAttributes()),
                'new_value' => null,
                'changed_by' => Auth::id(),
                'operation_type' => 'delete',
                'changed_at' => now(),
            ]);
        });
    }

}