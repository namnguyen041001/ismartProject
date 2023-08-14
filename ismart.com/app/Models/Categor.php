<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categor extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','parent_id','user_id'];

    function Product(){
        return $this->hasOne('App\Models\Product');
    }
}
