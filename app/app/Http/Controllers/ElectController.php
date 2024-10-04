<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
class ElectController extends Controller
{   use ValidatesRequests;
    public function addElect(Request $request){
        $this->validate(request(), [
            'id'=>['required','numeric']
        ]);
       Auth::user()->elect()->syncWithoutDetaching($request->id);
       return back()->with('success','');
    }

    public function deleteElect(Request $request, int $product_id){
        Auth::user()->elect()->detach($product_id);
       return back()->with('success','');
    }

    public function showElect(){
        $products=Auth::user()->elect()->get();
        return view('elect',[
            'products'=>$products
        ]);
    }
}