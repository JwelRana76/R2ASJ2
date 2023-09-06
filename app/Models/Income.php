<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'date', 'data' => 'date'],
        ['name' => 'category', 'data' => 'category'],
        ['name' => 'amount', 'data' => 'amount'],
        ['name' => 'note', 'data' => 'note'],
        ['name' => 'action', 'data' => 'action'],
    ];

    public function scopeActive($query)
    {
        return $query;
    }
}
