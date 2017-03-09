<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//dd("000");
?>

<h1>Edit A Product type</h1>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{!! Form::open(array('route' => 'frontend.product_types_update_put', 'class' => 'form','method' => 'put')) !!}



<div class="form-group">
    {{ Form::hidden('id', $productType->id , array('id' => 'invisible_id')) }}

    {!! Form::label('Product type') !!}
    {!! Form::text('description', $productType->description , 
        array('required', 
              'class'=>'form-control', 
              'id'=>'producttypedec',
              'placeholder'=> $productType->description  )) !!}
</div>
<legend>{{ trans('products::attribute.index') }}</legend>

     @include('frontend.producttype.attribute.index')

                   
<div class="form-group">
    
      <a id ="updateproducttype" class="btn btn-primary" data-url="{{route('frontend.product_types_update_put')}}" data-producttypeid="{{$productType->id}}"  data-redirect="{{route('frontend.product_types')}}">Submit</a>
</div>
{!! Form::close() !!}

<script>
    (function($){
        $(document).ready(function(){
            $('#updateproducttype').on('click',function(e){
                e.preventDefault();
                url = $(this).attr('data-url');
                producttypeid = $(this).attr('data-producttypeid');
                redirect = $(this).attr('data-redirect');
                attributes = [];
                $('input[name="attributes[]"]:checked').map(function () {
                                attributes.push(this.value);
                            });
                requiredAttributes =[];
                 $('input[name="requiredAttributes[]"]:checked').map(function () {
                                requiredAttributes.push(this.value);
                            });
                description = $('#producttypedec').val() ;
                console.log(attributes); 
                $.ajax({url:url,method:"PUT",data:{id:producttypeid,description:description,attributes: attributes,requiredAttributes:requiredAttributes}}).done(
                        function(data){
                            window.location.replace(redirect);
                            //$('#product_type_update_form').html(data);
                        }
                );
            });//onclick
        });//ready
    })(jQuery);
</script>
</div>












