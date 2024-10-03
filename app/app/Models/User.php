<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Scope;
use App\Models\Order;
use App\Models\Product;
use App\Models\News;
use App\Models\Cart;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'r_name',
        'sername',
        'patronymic',
        's_sername',
        'email',
        'birthday',
        'phone',
        's_phone',
        'passport',
        'take_date',
        'residence_address',
        'live_address',
        'taker',
        'company_name',
        'post',
        'w_phone',
        'from',
        'witness'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scope(){
        return $this->hasOne(Scope::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function news(){
        return $this->belongsToMany(News::class,'elect','news_id','user_id','id','id')->withPivot('comment')->withTimestamps();;
    }

    public function products(){
        return $this->belongsToMany(Product::class,'elect','user_id','product_id','id','id');
    }

    public function cart(){
        return $this->hasOne(Cart::class);
    }

    public function comment(){
        return $this->hasOne(Comment::class);
    }

    public function usersInfo(){
        return $this->hasOne(UsersPrivateInfo::class);
    }

}
