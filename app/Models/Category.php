<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent_id','gender','user_id'];

    public function gifts(){
        return $this->hasMany(Gift::class);
    }

    public function categories(){
        return $this->hasMany(Category::class, 'parent_id');
    }
}
