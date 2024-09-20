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

class RegisterEtap3Controller extends Controller
{
    protected $redirectTo = '/с/1/1';

    protected function redirectTo(){
        return url('/c/1/1');
     }
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\CheckEtap3::class);
    }


    public function create(Request $request)
    {    

       $res=Auth::user()->usersInfo()->update([
        'company_name'=>$request->company_name,
        'post'=>$request->post,
        'w_phone'=>$request->w_phone,
        'from'=>$request->from,
        'witness'=>$request->witness
    ]);
        return redirect($this->redirectTo());


 
    }

    public function showEtap3(){
        return view('auth/registerEtap3');
    }
}
