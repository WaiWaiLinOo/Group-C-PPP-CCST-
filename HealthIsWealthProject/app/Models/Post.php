<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'post_name',
        'detail',
        'user_id'
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
}
