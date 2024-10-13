<div class="sort">
    <div class="price">
        <span>По цене</span>
        <a 
        href="{{url('/c'.'/'.explode('/',URL::current())[4].'/1')}}" alt="">
        <img src="{{URL::asset('assets/svg/bottom.svg')}}" alt="">
        </a>
        <a 
        href="{{url('/c'.'/'.explode('/',URL::current())[4].'/2')}}">
            <img src="{{URL::asset('assets/svg/top.svg')}}" alt="">
        </a>
    </div>
</div>
<div class="pagination">
    <form action="{{url('/clearSession2')}}" method="post">
        @csrf
        <button type="submit"><img src="{{URL::asset('assets/svg/003-delete.svg')}}" alt=""></button>
    </form>
    <a 
    href="{{request()->session()->get('page')-1>0?(substr(URL::current(), 0,strlen(URL::current())-1).(request()->session()->exists('page'))?request()->session()->get('page')-1:'1'):''}}" class="p {{$request->session()->get('page')-1==0? 'none_active':''}}">
        <img src="{{URL::asset('assets/svg/bottom.svg')}}" alt="">
    </a>
    <a 
    href="{{request()->session()->get('page')+1<=$pagin_len?(substr(URL::current(), 0,strlen(URL::current())-1).(request()->session()->exists('page'))?request()->session()->get('page')+1:'1'):''}}" class="p {{$request->session()->get('page')+1>$pagin_len? 'none_active':''}}">
        <img src="{{URL::asset('assets/svg/top.svg')}}" alt="">
    </a>
</div>

