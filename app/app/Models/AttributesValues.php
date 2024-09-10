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


}
