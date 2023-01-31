<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name','expire_hours'];
    public function permissions() {
        return $this->belongsToMany(Users::class,'group_users','group_id','user_id');
      }
}
