<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'name', 'data' => 'name'],
        ['name' => 'account_no', 'data' => 'account_no'],
        ['name' => 'holder_name', 'data' => 'holder_name'],
        ['name' => 'branch', 'data' => 'branch'],
        ['name' => 'address', 'data' => 'address'],
        ['name' => 'action', 'data' => 'action'],
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
