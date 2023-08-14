<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id_account','code','total_price','address','phone','note','status'];
    function User(){
        return $this->belongsTo("App\Models\User", "id_account");
    }
    function Order_detail(){
        return $this->hasMany(Order_detail::class,'id_order', 'id');
    }
}
