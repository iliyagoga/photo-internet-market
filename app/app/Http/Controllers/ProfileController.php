<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ProfileController extends Controller
{ 
    use ValidatesRequests;
    public function index(){}

    public function showProfile(Request $request){
        return view("profile");
    }

    public function updateProfile(Request $request){
        $this->validate(request(), [
            "sername"=>['required','string', 'max:255'],
            "s_sername"=>['present'],
            'name' => ['required', 'string', 'max:255'],
            "patronymic"=>['required','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone'=>['required', 'numeric'],
            'birthday'=>['required', 'date'],
            'passport'=>['required','numeric'],
            'take_date'=>['required','date'],
            'residence_address'=>['required','string'],
            'live_address'=>['required','string'],
            'taker'=>['required','string'],
        ],[
            'sername.required'=>'Это поле должно быть заполнено',
            'name.required'=>'Это поле должно быть заполнено',
            'patronymic.required'=>'Это поле должно быть заполнено',
            'email.required'=>'Это поле должно быть заполнено',
            'phone.required'=>'Это поле должно быть заполнено',
            'birthday.required'=>'Это поле должно быть заполнено',
            'pasport.required'=>'Это поле должно быть заполнено',
            'take_date.required'=>'Это поле должно быть заполнено',
            'residence_address.required'=>'Это поле должно быть заполнено',
            'live_address.required'=>'Это поле должно быть заполнено',
            'taker.required'=>'Это поле должно быть заполнено',

            'sername.string'=>'Неверный формат ввода',
            'name.string'=>'Неверный формат ввода',
            'patronymic.string'=>'Неверный формат ввода',
            'phone.numeric'=>'Неверно введен номер телефона',
            'email.email'=>'Неверный формат ввода почты',
            'birthday.date'=>'Поле должно быть датой',

            'passport.numeric'=>'Неверный формат ввода',
            'take_date.date'=>'Неверный формат ввода',
            'residence_address.string'=>'Неверный формат ввода',
            'live_address.string'=>'Неверный формат ввода',
            'taker'=>'Неверный формат ввода',
        ]);
        Auth::user()->update([
            "name"=>$request->name,
            "sername"=>$request->sername,
            "s_sername"=>$request->s_sername,
            "birthday"=>$request->birthday,
            "patronymic"=>$request->patronymic,
            "email"=>$request->email,
            "phone"=>$request->phone
        ]);
        Auth::user()->usersInfo()->update([
            "passport"=>$request->passport,
            "take_date"=>$request->take_date,
            "residence_address"=>$request->residence_address,
            "live_address"=>$request->live_address,
            "taker"=>$request->taker,

            "company_name"=>$request->company_name,
            "w_phone"=>$request->w_phone,
            "from"=>$request->from,
            "witness"=>$request->witness
        ]);
        Auth::user()->save();
        return redirect(route('profile'));
    }   

    public function logout(){
        Auth::logout();
        return redirect(url('c/1/1'));
    }
    

}