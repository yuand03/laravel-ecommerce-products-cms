<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="product_type_update_form">
<h1>Create A New Product type</h1>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{!! Form::open(array('route' => 'frontend.product_types_create', 'class' => 'form','method' => 'post')) !!}



<div class="form-group">
    {!! Form::label('Product type') !!}
    {!! Form::text('description', null, 
        array('required', 
              'class'=>'form-control', 
              'id'=>'producttypedec',
              'placeholder'=>'Product type')) !!}
</div>

<div class="form-group">
    
      <a id ="createproducttype" class="btn btn-primary" data-url="{{route('frontend.product_types_create')}}" >Submit</a>

</div>
{!! Form::close() !!}
<script>
    (function($){
        $(document).ready(function(){
            $('#createproducttype').on('click',function(e){
                e.preventDefault();
                url = $('#createproducttype').attr('data-url');
                descriptipon = $('#producttypedec').val();
                console.log(descriptipon);
                $.post( url,{description:descriptipon}).done(function( data ) {
                        console.log(data);
                    $( "#product_type_update_form" ).html( data );
                }) ;
                        
                
            });//onclick
        });//ready
    })(jQuery);
</script>
</div>