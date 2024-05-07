<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'post_id', 'user_id'];


    public function postComment(){
        
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
        return $this->belongsTo(Post::class);
    }
}
