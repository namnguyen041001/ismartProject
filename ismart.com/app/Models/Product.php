<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'price',
        'sale_price',
        'dess',
        'detail',
        'thumbnail',
        'featured',
        'categor_id',
        'status',
        'total_product',
    ];
    function Categor(){
        return $this->belongsTo("App\Models\Categor");
    }
    function Order_detail(){
        return $this->belongsTo(Order_detail::class, 'id_product','id');
    }
}
