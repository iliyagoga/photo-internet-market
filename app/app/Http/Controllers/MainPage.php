<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use App\Models\News;
class MainPage extends Controller
{
    public function index(){
        $arr=[];
        foreach(DB::select('
        (select id from  (select count(*) as "count" ,a.id as "id"  from "products" a inner join "element_orders" b on a.id=b.product_id group by a.id order by "count" DESC) as t order by t.count DESC) limit 9
        ') as $pr){
            array_push($arr,$pr->id);
        };
        $products=Product::wherein('id',$arr)->get();
        return view('meanPage',[
            'news'=>News::take(5)->get(),
            'products'=>$products

        ]);
    }
}
