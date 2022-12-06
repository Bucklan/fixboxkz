<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = ['name_company','user_id','image','category_id'];

    public function user(){
        return $this->hasOne(User::class);
    }
}
