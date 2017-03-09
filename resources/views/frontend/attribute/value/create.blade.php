<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form action="{{ route('frontend.attribute-value.store')}}" method="post">
        {!! csrf_field() !!}
        {!! method_field('post') !!}

        {!!Form::hidden('id', $attribute->id)  !!}


            <h1>{{ trans('products::attribute-value.create') }}</h1>

            
                <div class="form-group">
                    <label>{{ trans('products::attribute-value.attribute') }}</label>
                    <p class="form-control-static">{{ $attribute->description }}</p>
                </div>
                <div class="form-group">
                    {!! $errors->first('value', '<p class="alert alert-warning">:message</p>') !!}
                    <label for="value">{{ trans('products::attribute-value.value') }}</label>
                    <input type="text" name="value" id="value" value="{{ old('value') }}" class="form-control" required>
                </div>
             {!!Form::submit('submit',['class'=>'btn btn-primary'])!!}

             <div id="store_new_value" data-url="{{route('frontend.attribute-value.store')}}" data-id={{$attribute->id}} >ajax call</div>
    </form>
<script>
    (function($){
        $(document).ready(function(){
             $("#store_new_value").on('click',function(){
                console.log('add value');
                url = $(this).attr('data-url');
                id=$(this).attr('data-id');
                value = $('#value').val();
                console.log(id);
        console.log(value);
       // id= $('')
        $.post( url,{id:id,value:value}).done(function( data ) {
        //    console.log(data);
        $( "#attribute_value_index" ).html( data );
        $( "#place_form" ).html( '');
        });
        });
        });
    })(jQuery);
</script>
