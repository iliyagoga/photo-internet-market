<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountCartProducts extends Model
{
    use HasFactory;
    protected $fillable=['count'];

    public function cart(){
        return $this->belongsToMany(Cart::class);
    }

}
