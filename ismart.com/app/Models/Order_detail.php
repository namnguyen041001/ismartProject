<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable = ['id_order','id_product','price','quantity'];
    use HasFactory;
    function Order(){
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }
    function Product(){
        return $this->belongsTo(Product::class, 'id_product','id');
    }
}
