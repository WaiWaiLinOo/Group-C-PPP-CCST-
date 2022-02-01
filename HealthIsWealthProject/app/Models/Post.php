<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Likeable;
    protected $fillable = [
        'post_name',
        'detail',
        'user_id',
        'category_id'
    ];
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    protected $dates = ['deleted_at'];
    public function likes(){
        return $this->hasMany('App\Models\LikeDislike','post_id')->sum('like');
    }
    // Dislikes
    public function dislikes(){
        return $this->hasMany('App\Models\LikeDislike','post_id')->sum('dislike');
    }
}
