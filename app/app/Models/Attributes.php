<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
class Attributes extends Model
{
    use HasFactory;
    protected $fillable=['value'];

    public function products(){
        return $this->belongsToMany(Product::class,'attributes_values','attributes_id','product_id','id','id')->withPivot('value');
    }
}
