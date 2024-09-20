<?php

namespace App\Http\Middleware;

use App\Models\UsersPrivateInfo;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEtap3
{

    public function handle(Request $request, Closure $next): Response
    {   
       if(UsersPrivateInfo::whereNull('company_name')
       ->orWhereNull('post')
       ->orWhereNull('w_phone')
       ->orWhereNull('from')
       ->orWhereNull('witness')->first()){
        return $next($request);
       }
       return redirect('c/1/1');

    }
}
