<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    use ValidatesRequests;
    public function getSearchProducts(Request $request){
        $this->validate(request(), [
            'model'=>['required']
        ]);
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
        if(count(Product::get())>0){
            if(count(request()->all())>0){
                foreach(session()->all() as $k=>$v){
                    if($k!='_token'){
                        session()->remove($k);
                    }
       
                }
            }
            session(['page'=>$request->model]);
            $productsFind=[];
            $productsIds=[];
            foreach(Product::whereLike('model',$request->model.'%')->skip(9*($request->page-1))->take(9)->get() as $product){
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
            return view('searchPage',[
                'catalog'=>$productsFind,
                "count"=>count($productsFind),
                'request'=>request(),
                'pagin_len'=>ceil(count($productsFind)/9)
                    
            ]);
            }   
           
    }
}