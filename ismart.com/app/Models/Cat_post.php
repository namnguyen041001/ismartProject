<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_post extends Model
{
    protected $fillable = ['name','slug','parent_id','user_id'];
    use HasFactory;
}
