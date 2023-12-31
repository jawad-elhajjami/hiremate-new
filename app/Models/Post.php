<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Like;
use App\Models\Candidate;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class); 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);

    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
