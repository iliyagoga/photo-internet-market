<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable=['value'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
