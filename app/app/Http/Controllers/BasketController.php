<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Product;
use Auth;
use Date;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
class BasketController extends Controller{

    public function addToCart(Request $request){
        if(Cart::where("user_id", Auth::user()->id)->get()->count()==0){
            $start=time();
            $end= time()+86400;
            $cart=User::find(Auth::user()->id)->cart()->create([
                'start'=>date('d.m.Y H:i:s', $start),
                'stop'=>date('d.m.Y H:i:s', $end)
            ]);
            $cart->products()->syncWithPivotValues([$request->product_id],['count'=>1]);
        }
        else{
            if(Cart::where('user_id', Auth::user()->id)->first()->products()->where('product_id','=',$request->product_id)->count()==0){
                $cart=User::find(Auth::user()->id)->cart()->first();
                $cart->products()-> syncWithoutDetaching([$request->product_id],['count'=>1]);
            }
        
        }
     
    }

    public function showCart(){
        return view('cart',['cart'=>Auth::user()->cart()->first()]);
    }
}