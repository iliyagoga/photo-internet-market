<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
class Order extends Model
{
    protected $fillable = ['start','stop','convoy','delivery','onlinepay','comment'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'elements_orders','product_id','order_id','id','id')->withPivot('count');
    }
}
