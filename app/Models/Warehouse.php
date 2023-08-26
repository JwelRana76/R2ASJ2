<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    public static $columns = [
        ['name' => 'name', 'data' => 'name'],
        ['name' => 'action', 'data' => 'action'],
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
