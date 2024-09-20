<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsersPrivateInfo extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
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





    public function users(){
        return $this->belongsTo(User::class);
    }



}
