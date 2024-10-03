<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class News extends Model
{
    use HasFactory;
    protected $fillable=['title','text'];



    public function comment(){
        return $this->hasOne(Comment::class);
    }
}
