<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


    use RegistersUsers;

    protected $redirectTo = '/registerEtap2';


    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {   $messages=[
        'sername.required'=>'Это поле должно быть заполнено',
        'name.required'=>'Это поле должно быть заполнено',
        'patronymic.required'=>'Это поле должно быть заполнено',
        'email.required'=>'Это поле должно быть заполнено',
        'phone.required'=>'Это поле должно быть заполнено',
        'date.required'=>'Это поле должно быть заполнено',
        'password.required'=>'Это поле должно быть заполнено',
        'sername.string'=>'Неверный формат ввода',
        'name.string'=>'Неверный формат ввода',
        'patronymic.string'=>'Неверный формат ввода',
        'password.string'=>'Неправильный формат ввода',
        'phone.numeric'=>'Неверно введен номер телефона',
        'email.email'=>'Неверный формат ввода почты',
        'password.confirmed'=>'Пароли не совпадают',
        'password.min'=>'Пароль должен быть не менее 8 символов',
        'date.date'=>'Поле должно быть датой',
        'email.unique'=>'Такая почта уже зарегистрирована',
        'phone.unique'=>'Такой номер уже зарегистрирован'
    ];
        return Validator::make($data, [
            "sername"=>['required','string', 'max:255'],
            "s_sername"=>['present'],
            'name' => ['required', 'string', 'max:255'],
            "patronymic"=>['required','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=>['required', 'numeric','unique:users'],
            'date'=>['required', 'date'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'r_name' => $data['name'],
            'email' => $data['email'],
            'birthday' => $data['date'],
            'sername'=>$data['sername'],
            's_sername'=>$data['sername']?$data['sername']:null,
            "patronymic"=>$data["patronymic"],
            "phone"=>$data['phone'],
            "s_phone"=>$data['phone'],
            'password' => Hash::make($data['password']),

        ]);
        $user->roles()->syncWithoutDetaching([1]);
        return $user;
    }
}
