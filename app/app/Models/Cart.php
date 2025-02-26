<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['start','stop'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'countCartProducts','cart_id','product_id','id','id')->withTimestamps();
    }

    public function countCartProduct(){
        return $this->hasOne(CountCartProducts::class);
    }

}
