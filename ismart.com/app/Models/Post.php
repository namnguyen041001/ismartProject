<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','cat_post_id','title','slug','detail','thumbnail','status'];

    function Cat_post(){
        return $this->belongsTo(Cat_post::class, "cat_post_id",'id');
    }
    function User(){
        return $this->belongsTo(User::class, "user_id",'id');
    }
}
