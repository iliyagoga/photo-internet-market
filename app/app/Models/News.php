<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class News extends Model
{
    use HasFactory;
    protected $fillable=['title','text'];

    public function users(){
        return $this->belongsToMany(User::class,'elect','user_id','news_id','id','id')->withPivot('comment')->withTimestamps();
    }
}
