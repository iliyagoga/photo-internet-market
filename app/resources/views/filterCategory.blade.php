<pre>
    {{print_r($product)}}
</pre>
<div class="filter">

    <form action="{{URL::current()}}">
        @foreach ($product->attributes()->get() as $attribute)
            <div class="attribute">
                <h4>{{$attribute->value}}</h4>
                @foreach ($attribute->attributesValue()->distinct('value')->get() as $attributeValue)
                    <div class="value">
                        <input type="checkbox" name="at_{{$attribute->id}}" id="av_{{$attributeValue->id}}" value="{{$attributeValue->value}}">
                        <label for="av_{{$attributeValue->id}}">{{$attributeValue->value}}</label>
                    </div>
                @endforeach
            </div>
        @endforeach
        <button type="submit">55</button>
    </form>
</div>

