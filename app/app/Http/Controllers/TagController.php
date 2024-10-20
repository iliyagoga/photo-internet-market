<?php

namespace App\Http\Controllers;


use App\Models\Product;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use ValidatesRequests;
    public function getTagProducts(Request $request){
    
        $price=null;
        if(!empty($request->price)){
            if ($request->price==1){
                session(['price'=>'ASC']);
                $price='ASC';
            }
            if ($request->price== 2){
                session(['price'=>'DESC']);
                $price= 'DESC';
            }

        }elseif((session())->exists('price')){
            $price=session('price');
        }
        if(count(request()->all())>0){
            foreach(session()->all() as $k=>$v){
                if($k!='_token'){
                    session()->remove($k);
                }
    
            }
        }   
        $productsFind=[];
        $productsIds=[];
        foreach(Tag::where('value','=',$request->tag)->get() as $tag){
            $product=Product::find($tag->product_id);
            if(!in_array($product->id,$productsIds)){
                array_push($productsFind,$product);
                array_push($productsIds,$product->id);
            }
            
            
        }
        if($price=='ASC'){
            usort($productsFind,function($a,$b){
                return $a->price_wkday>$b->price_wkday;
            });
        }
        if($price=='DESC'){
            usort($productsFind,function($a,$b){
                return $a->price_wkday<$b->price_wkday;
            });
        }
        session(['page'=>$request->page]);
        return view('tagProducts',[
            'catalog'=>$productsFind,
            "count"=>count($productsFind),
            'request'=>request(),
            'pagin_len'=>ceil(count($productsFind)/9)
                
        ]);
            
        
    }
}