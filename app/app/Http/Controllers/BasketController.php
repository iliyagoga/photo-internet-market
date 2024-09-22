<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Product;
use Auth;
use Carbon\Carbon;
use Date;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
class BasketController extends Controller{
    use ValidatesRequests;
    public function addToCart(Request $request){
        if(Cart::where("user_id", Auth::user()->id)->get()->count()==0){
            $start=time();
            $end= time()+86400;
            $cart=User::find(Auth::user()->id)->cart()->create([
                'start'=>date('d.m.Y H:i:s', $start),
                'stop'=>date('d.m.Y H:i:s', $end)
            ]);
            $cart->products()->syncWithPivotValues([$request->product_id],['count'=>1]);
            return redirect()->back()->with('success','');
        }
        else{
            if(Cart::where('user_id', Auth::user()->id)->first()->products()->where('product_id','=',$request->product_id)->count()==0){
                $cart=User::find(Auth::user()->id)->cart()->first();
                $cart->products()-> syncWithoutDetaching([$request->product_id],['count'=>1]);
                return redirect()->back()->with('success','');
            }
        
        }
        return redirect()->back()->with('success','');
     
    }

    public function showCart(){
        $cart=Auth::user()->cart()->first();
        $products=$cart->products()->withPivot(['count'])->get();
        foreach($products as $product){
            $r=round((strtotime($cart->stop)-strtotime($cart->start))/(60*60*24));
            $price=0;
            $date=strtotime($cart->start);
            if($r<7){
                for($i=0;$i<$r;$i++){
                    if(date('w',$date)==6 || date('w',$date)==5){
                        $price+=$product->price_wend;
                    }
                    else{
                        $price+=$product->price_wkday;
                    }
                    $date+=86400;
                }
            }else
            if($r>=7 and $r<30){
                while($r-7>=0){
                    $date+=86400*7;
                    $price+=$product->price_week;
                    $r-=7;
                }
                for($i=0;$i<$r;$i++){
                    if(date('w',$date)==6 || date('w',$date)==5){
                        $price+=$product->price_wend;
                    }
                    else{
                        $price+=$product->price_wkday;
                    }
                    $date+=86400;
                }
            }else
            if($r>=30){
                while($r-30>=0){
                    $date+=86400*30;
                    $price+=$product->price_month;
                    $r-=30;
                }
                while($r-7>=0){
                    $date+=86400*7;
                    $price+=$product->price_week;
                    $r-=7;
                }
                for($i=0;$i<$r;$i++){
                    if(date('w',$date)==6 || date('w',$date)==5){
                        $price+=$product->price_wend;
                    }
                    else{
                        $price+=$product->price_wkday;
                    }
                    $date+=86400;
                }
            }
            $product->price_wkday=$price;
        }
        return view('cart',['cart'=>$cart,'products'=>$products]);
    }

    public function redactDates(Request $request){
        $this->validate(request(),[
            'time_start'=>'required|date|after_or_equal:' . Carbon::now()->toDateString(),
            'time_end'=>'required|date|after_or_equal:' . $request->time_start,
        ],[
            'time_start.after_or_equal'=>'Дата не может быть раньше сегодняшней',
            'time_end.after_or_equal'=>'Дата не может быть раньше даты начала аренды',
        ]);
        Auth::user()->cart()->first()->update(['start'=>$request->time_start,'stop'=>$request->time_end]);
        Auth::user()->save();
        return redirect()->back()->with('success','');
    }

    public function deleteFromCart(Request $request){
        Auth::user()->cart()->first()->products()->detach($request->product_id);
        return redirect(route('showCart'));
    }    

    public function showPreOrder(Request $request){
        $cart=Auth::user()->cart()->first();
        $ids=[];
        $counts=[];
        foreach(request()->all() as $k=>$v){
            if(str_contains($k,'product_')){
                array_push($ids,explode('product_',$k)[1]);
                array_push($counts,$v);
            }
          
        }
        $products=$cart->products()->whereIn('product_id',$ids)->withPivot(['count'])->get();
        $c=$cart->products()->whereIn('product_id',$ids)->withPivot(['count'])->get()->count();
        $summ=0;
        for($i=0;$i<$c;$i++){
            $product= $products[$i];
            $r=round((strtotime($cart->stop)-strtotime($cart->start))/(60*60*24));
            $price=0;
            $date=strtotime($cart->start);
            if($r<7){
                for($j=0;$j<$r;$j++){
                    if(date('w',$date)==6 || date('w',$date)==5){
                        $price+=$product->price_wend;
                    }
                    else{
                        $price+=$product->price_wkday;
                    }
                    $date+=86400;
                }
            }else
            if($r>=7 && $r<30){
                while($r-7>=0){
                    $date+=86400*7;
                    $price+=$product->price_week;
                    $r-=7;
                }
                for($j=0;$j<$r;$j++){
                    if(date('w',$date)==6 || date('w',$date)==5){
                        $price+=$product->price_wend;
                    }
                    else{
                        $price+=$product->price_wkday;
                    }
                    $date+=86400;
                }
            }else
            if($r>=30){
                while($r-30>=0){
                    $date+=86400*30;
                    $price+=$product->price_month;
                    $r-=30;
                }
                while($r-7>=0){
                    $date+=86400*7;
                    $price+=$product->price_week;
                    $r-=7;
                }
                for($j=0;$j<$r;$j++){
                    if(date('w',$date)==6 || date('w',$date)==5){
                        $price+=$product->price_wend;
                    }
                    else{
                        $price+=$product->price_wkday;
                    }
                    $date+=86400;
                }
            }
            $product->price_wkday=$price;
            $product->pivot->count=$counts[$i];
            $summ+=$price*$product->pivot->count;
        }
        return view('preorder',[
            'summ'=>$summ, 
            'dates'=>date('d.m.Y',strtotime($cart->start)).' - '.date('d.m.Y',strtotime($cart->stop)),
            'products'=>$products
        ]);
    }
}