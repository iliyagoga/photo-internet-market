<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
}
