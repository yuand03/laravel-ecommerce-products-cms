<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form action="{{ route('frontend.attribute-value.update', [$attributeValue->id, 'attributeId='.$attribute->id]) }}" method="post">
        {!! csrf_field() !!}
        {!! method_field('patch') !!}


        

            <h1>{{ trans('products::attribute-value.edit') }}</h1>

                    <div class="form-group">
                        <label>{{ trans('products::attribute-value.attribute') }}</label>
                        <p class="form-control-static">{{ $attribute->description }}</p>
                    </div>
                    <div class="form-group">
                        {!! $errors->first('value', '<p class="alert alert-warning">:message</p>') !!}
                        <label for="value">{{ trans('products::attribute-value.value') }}</label>
                        <input type="text" name="value" id="value" value="{{ old('value', $attributeValue->value) }}" class="form-control" required>
                    </div>
            <a id="updatevalue" class="btn btn-primary" data-url="{{ route('frontend.attribute-value.update', [$attribute->id]) }}" data-attributevalueid="{{$attributeValue->id}}">Submit</a>
   
    </form>

<script>
    (function($){
        $(document).ready(function(){
            $('#updatevalue').on('click',function(e){
                e.preventDefault();
                url=$(this).attr('data-url');
                attributevalueid = $(this).attr('data-attributevalueid');
                value = $('#value').val();
               
                $.ajax({
                url: url,
                data:{attributevalueid:attributevalueid,value:value},
                type: 'PATCH',
                success: function(data) {
                  $( "#attribute_value_index" ).html( data );
                  $( "#place_form" ).html( '');
                }
              });
            });
        });
    })(jQuery);
</script>