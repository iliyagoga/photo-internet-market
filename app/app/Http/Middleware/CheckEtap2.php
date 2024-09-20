<?php

namespace App\Http\Middleware;

use App\Models\UsersPrivateInfo;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEtap2
{

    public function handle(Request $request, Closure $next): Response
    {   
       if(empty(UsersPrivateInfo::where('user_id','=', $request->user()->id)->first())){
        return $next($request);
       }
       return redirect('/c/1/');

    }
}
