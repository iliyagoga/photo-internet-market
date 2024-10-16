<?php
namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;


class Admin{
    public function handle(Request $request, Closure $next)
    { 
       if(Auth::user()->role()->where('role','=','admin')->count()==1){
        return $next($request);
       }
       return redirect('/c/1/');

    }
}

?>