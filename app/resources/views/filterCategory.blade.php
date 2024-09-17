
<div class="filter">
    
    <form action="{{substr(URL::current(), 0,strlen(URL::current())-1).(request()->session()->exists('page'))?request()->session()->get('page'):'1'}}">
        @foreach ($attributes as $k=>$v)
            <div class="attribute">
                <h4>{{$v['value']}}</h4>
                @foreach ($v['values'] as $attributeValue)
                    <div class="value">
                        @if (  session()->exists($attributeValue[1]))
                        <input checked="checked" type="checkbox" name="at_{{$k}}" id="av_{{$attributeValue[1]}}" value="{{$attributeValue[1]}}"/>
                        @else
                        <input type="checkbox" name="at_{{$k}}" id="av_{{$attributeValue[1]}}" value="{{$attributeValue[1]}}"/>
                        @endif
                        <label for="av_{{$attributeValue[0]}}">{{$attributeValue[0]}}</label>
                     
                    </div>
                @endforeach
            </div>
        @endforeach
        <button type="submit">Искать</button>
    </form>
</div>

