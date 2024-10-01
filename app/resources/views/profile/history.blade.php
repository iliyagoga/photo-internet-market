@php
function getCombinatePrice($start, $stop, $product){
        $r=round((strtotime($stop)-strtotime($start))/(60*60*24));
        $price=0;
        $date=strtotime($start);
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
        return $price;
    }
@endphp
<div class="history">
    <div class="table">
        <div class="theads">
            <div class="thead">
                <span>Заказ</span>
            </div>
            <div class="thead">
                <span>Кол-во дней</span>
            </div>
            <div class="thead">
                <span>Период</span>
            </div>
            <div class="thead">
                <span>Сумма</span>
            </div>
            <div class="thead">
                <span>Бонусы</span>
            </div>
        </div>
     
           
       
        <div class="tbody">
            @foreach ($orders as $order)
                <div class="chars-pr">
                    <div class="h">
                        <div class="chars-pr-elem">
                            <span class="id_order">{{$order->id}}</span>
                        </div>
                        <div class="chars-pr-elem">
                            <span class="time_order">{{(strtotime($order->stop)-strtotime($order->start))/(60 * 60 * 24)}}</span>
                        </div>
                        <div class="chars-pr-elem">
                            <span class="dates_order">
                                {{$order->start}} - {{$order->stop}}
                            </span>
                        </div>
                        <div class="chars-pr-elem"> 
                            <span class="summ">
                                {{$order->summ}} Р
                            </span>
                        </div>
                        <div class="chars-pr-elem">
                            <span class="scope">
                                0
                            </span>
                        </div>
                        <div class="chars-pr-elem">
                            <img class="arrow" src="{{URL::asset('assets/svg/left-arrow.svg')}}" alt="">
                        </div>
        
                    </div>
                  
                    <div class="t-products hidden">
                    @foreach ($order->products()->withPivot('count')->get() as $product )
                        <div class="t-product">
                            <div class="preview">
                                <img src="{{Storage::url($product->mean_image)}}" alt="">
                            </div>
                            <div>
                                <div class="name">
                                    <h3>{{$product->model}}</h3>
                                    <span>{{$product->company()->first()->name}}</span>
                                </div>
                            </div>
                            <div>
                                <div class="count">
                                    <span>x{{$product->pivot->count}}</span>
                                </div>
                            </div>
                            <div>
                                <div class="price">
                                    <span>{{getCombinatePrice($order->start,$order->stop,$product)}} Р</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <a href="{{url('c/1/1')}}" class="button">
        Каталог
    </a>
</div>