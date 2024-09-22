<?php

namespace App\Http\Controllers;
use App\Models\ElementOrder;
use App\Models\Order;
use App\Models\Product;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class OrderController extends Controller
{ 
    use ValidatesRequests;

    public function createOrder(Request $request){
        $this->validate(request(), [
            'dates'=>['required']
        ]);
        $productsIds=[];
        $counts=[];
        $date=[
            'start'=>'',
            'stop'=>''
        ];
        foreach ($request->all() as $key => $value) {
            if($key[0]=='p'){
                array_push($productsIds,explode('_',$key)[1]);
                array_push($counts,$value);
            }
            if($key=='dates'){
                $date['start']=date('Y-m-d',strtotime(trim(explode(' - ',$value)[0])));
                $date['stop']=date('Y-m-d',strtotime(trim(explode(' - ',$value)[1])));
            }
        }
        $order=Auth::user()->order()->create([
            'start'=>$date['start'],
            'stop'=>$date['stop'],
            'convoy'=>empty($request->convoy)?false:true,
            'delivery'=>empty($request->delivery)?false:true,
            'onlinepay'=>empty($request->onlinepay)?false:true,
            'comment'=>empty($request->comment)?'':$request->comment
        ]);
        $order->save();
        for($i= 0;$i<count($productsIds);$i++){
            ElementOrder::insert([
                'order_id'=>$order->id,
                'product_id'=>$productsIds[$i],
                'count'=>$counts[$i]
            ]);
        }

        return redirect(url('c/1/1'));

    }
}