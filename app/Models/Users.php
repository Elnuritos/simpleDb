<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name','email','active'];
    public function permissions() {
        return $this->belongsToMany(Users::class,'group_users','user_id','group_id');
      }
}
