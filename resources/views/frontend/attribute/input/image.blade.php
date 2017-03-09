
@if($value==null)
    <div><input name="{{ $name }}[]" id="{{ $name }}" type="file"  multiple></div>
@else
    @php
       $valuearray = unserialize( $value );
     
    @endphp
    <div>
    @foreach ($valuearray as $val)
      <img src='storage/images/{{$val}}' style="width:50px;height:50px">
    @endforeach
    </div>
    {{ $attribute->id }} and {{ $product->id }}
 @endif