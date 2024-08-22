<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Complectation;
use App\Models\Company;
use App\Models\Gallery;
use App\Models\Tag;
use App\Models\Order;
use App\Models\Attributes;
use App\Models\User;
use App\Models\Cart;

class Product extends Model
{
    protected $fillable=['model','text','price_wkday','price_wend','price_week','price_month','stock','mean_image'];

    public function category(){
        return $this->hasMany(Category::class);
    }

    public function complectation(){
        return $this->hasMany(Complectation::class);
    }

    public function company(){
        return $this->hasMany(Company::class);
    }

    public function gallery(){
        return $this->hasMany(Gallery::class);
    }

    public function tag(){
        return $this->hasMany(Tag::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'elements_orders','order_id','product_id','id','id')->withPivot('count');
    }

    public function attributes(){
        return $this->belongsToMany(Attributes::class,'attributes_values','product_id','attributes_id','id','id')->withPivot('value');
    }
    
    public function users(){
        return $this->belongsToMany(Users::class,'elect','product_id','user_id','id','id');
    }

    public function carts(){
        return $this->belongsToMany(Cart::class,'countCartProducts','product_id','cart_id','id','id')->withTimestamps();
    }




}
