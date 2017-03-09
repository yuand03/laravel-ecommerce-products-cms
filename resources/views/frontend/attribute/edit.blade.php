<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form action="{{ route('frontend.attribute.update', $attribute->id) }}" method="post">
        {!! csrf_field() !!}
        {!! method_field('put') !!}

        
            <h1>{{ trans('products::attribute.edit') }}</h1>

                <fieldset >
                    <legend>{{ trans('products::attribute.description') }}</legend>
                    <div class="form-group">
                        {!! $errors->first('description', '<p class="alert alert-warning">:message</p>') !!}
                        <label for="description">{{ trans('products::attribute.description') }}</label>
                        <input type="text" name="description" id="description" value="{{ old('description', $attribute->description) }}" class="form-control" required>
                        
                    </div>
                    <div class="form-group">
                        <label for="type">{{ trans('products::attribute.type') }}</label>
                        <p class="form-control-static">{{ trans('products::attribute.' . $attribute->type) }}</p>
                    </div>
                </fieldset>

                <fieldset >
                    <legend>{{ trans('products::attribute.' . $attribute->type) }} {{ trans('products::attribute.type_settings') }}</legend>
                    
                    @include('frontend.attribute.type.' . $attribute->type)
                    
                </fieldset>
            
           {!!Form::submit('Submit',['class'=>'Btn btn-primary']) !!}
    </form>
<div id ="place_form">
    
</div>
<script>
  (function($){
      $(document).ready(function(){
          $("#add_attribute_value").on('click',function(){
        console.log('add value');
        url = $(this).attr('data-url');
        console.log(url);
        $.get( url, function( data ) {
            console.log(data);
        $( "#place_form" ).html( data );
        
        });
    });
      });
  })(jQuery);
</script>