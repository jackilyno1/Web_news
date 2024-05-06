<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'content',
        'id_category',
        'img_url',
    ];

    public function post(){
        return $this->hasOne(Categories::class, 'id', 'id_category');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
