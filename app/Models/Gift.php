<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = ['name',
        'content', 'user_id', 'price',
        'image', 'category_id',
        'feedback'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->HasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usersRated()
    {
        return $this->belongsToMany(User::class, 'rating')
            ->withPivot('rating')
            ->withTimestamps();
    }

    public function usersLike()
    {
        return $this->belongsToMany(User::class, 'like')
            ->withPivot('like')
            ->withTimestamps();
    }

    public function usersBought()
    {
        return $this->belongsToMany(Gift::class, 'cart')
            ->withTimestamps()
            ->withPivot('number', 'status');
    }
}
