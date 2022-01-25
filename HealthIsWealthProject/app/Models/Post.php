<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_name',
        'detail',
        'user_id'
    ];
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    //public function category(){
    //    return $this->belongsTo(Category::class);
    //}
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
