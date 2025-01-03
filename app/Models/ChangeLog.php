<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChangeLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'change_log';
    protected $fillable = [
        'table_name',
        'row_id',
        'column_name',
        'old_value',
        'new_value',
        'changed_by',
        'operation_type',
        'changed_at',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'changed_by');
    }
}