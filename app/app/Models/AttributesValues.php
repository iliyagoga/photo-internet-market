<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributesValues extends Model
{
    use HasFactory;
    protected $fillable=['value'];

    public function attributes(){
        return $this->belongsTo(Attributes::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'attributes_products','attributes_values_id','product_id','id','id');
    }


}
