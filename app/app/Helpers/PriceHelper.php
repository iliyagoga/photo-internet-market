<?
namespace App\Helpers;

class PriceHelper{

    public static function getCombinatePrice($start, $stop, $product){
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
}

?>