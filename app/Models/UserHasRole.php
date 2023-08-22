<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasRole extends Model
{
    use HasFactory;
    protected $fillable = ['role_id','user_id'];

    public function role_name()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
