
@extends ('layouts.app')

@section('content')
<div class="body">
    <h1><span>Новости</span><br> компании</h1>
    <div class="news">
        @foreach ($news as $n )
            <div class="block">
                <div class="preview">
                    <img src={{Storage::url($n->image)}} alt="">
                </div>
                <div class="content">
                    <div class="date">
                        <span>{{(new DateTime($n->created_at))->format('j F Y')}}</span>
                    </div>
                    <div class="title">
                        <p>{{$n->title}}</p>
                    </div>
                    <div class="text">
                        <p>{{$n->text}}</p>
                    </div>
                </div>
          
            </div>
        @endforeach
    </div>
</div>
@endsection('content')