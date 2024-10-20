<div class="sort">
    <div class="price">
        <span>По цене</span>
        <a 
        href="{{url('/catalog'.'/'.explode('/',URL::current())[4].'/'.explode('/',URL::current())[5].'/1')}}" alt="">
        <img src="{{URL::asset('assets/svg/bottom.svg')}}" alt="">
        </a>
        <a 
        href="{{url('/catalog'.'/'.explode('/',URL::current())[4].'/'.explode('/',URL::current())[5].'/2')}}">
            <img src="{{URL::asset('assets/svg/top.svg')}}" alt="">
        </a>
    </div>
</div>
<div class="pagination">
    <form action="{{url('/clearSession')}}" method="post">
        @csrf
        <button type="submit"><img src="{{URL::asset('assets/svg/003-delete.svg')}}" alt=""></button>
    </form>
    @php
     $url=explode('/',url()->current())[3].'/'.explode('/',url()->current())[4];
    global  $price;
    if (request()->session()->get('price')){
        if(request()->session()->get('price')=="DESC"){
        $price=2;}
        else{
        $price=1;}
    }
    else{
    $price='';}
    @endphp
    <a 
    href="<?php if(request()->session()->get('page')-1>0) echo url($url,[request()->session()->get('page')-1,$price]); ?>"  class="p <?php if($request->session()->get('page')-1==0) echo 'none_active'; echo ''?>">
        <img src="{{URL::asset('assets/svg/bottom.svg')}}" alt="">
    </a>
    <a 
      href="<?php if(request()->session()->get('page')+1<=$pagin_len)echo url($url,[request()->session()->get('page')+1,$price]);?>" class="p <?php if($request->session()->get('page')+1>$pagin_len) echo 'none_active'; echo ''?>">
        <img src="{{URL::asset('assets/svg/top.svg')}}" alt="">
    </a>

</div>

