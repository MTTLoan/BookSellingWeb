<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'sex',
        'birthday',
        'address',
        'ward',
        'district',
        'province',
        'starting_date',
        'salary',
        'position',
        'branch_id',
        'user_id',
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id'); 
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}