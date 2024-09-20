<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersPrivateInfo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterEtap2Controller extends Controller
{
    protected $redirectTo = '/с/1/1';

    protected function redirectTo(){
        return route('showEtap3');
     }
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\CheckEtap2::class);
    }


    public function create(Request $request)
    {    

       $res=Auth::user()->usersInfo()->create([
        'passport'=>$request->passport,
        'take_date'=>$request->take_date,
        'residence_address'=>$request->residence_address,
        'live_address'=>$request->live_address,
        'taker'=>$request->taker
    ]);
        return redirect($this->redirectTo());


 
    }

    public function showEtap2(){
        return view('auth/registerEtap2');
    }
}
