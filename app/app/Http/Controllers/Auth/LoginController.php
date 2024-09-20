<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Redirect;
use Request;
use Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    use ValidatesRequests;
    protected $redirectTo = '/home';


    public function __construct()
    {  
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request): RedirectResponse{
        $req= request()->all();
        $messages=[
                    'email.email'=>'Неверный формат ввода почты',
                    'password.required'=>'Это поле должно быть заполнено',
                ];
        $this->validate(request(), [
                        "email"=>['required','email'],
                        "password"=>['required','string'],
                    ],$messages);
        if(auth()->attempt(array('email' => $req['email'], 'password' => $req['password']))){
            return redirect(url('c/1/1'));
        }
        else{
            return Redirect::back()->withErrors(['error'=>'Неправильный логин или пароль']);
        }

    }

}
