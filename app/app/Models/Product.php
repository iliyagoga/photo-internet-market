<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['model','text','price_wkday','price_wend','price_week','price_month','stock','mean_image'];
}
