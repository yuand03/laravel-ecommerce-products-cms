<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>





<div id="edit_product_form">

<form action="{{ route('frontend.products_create') }}" method="post">
        {!! csrf_field() !!}
        


            <h1>{{ trans('Create A New Product') }}</h1>

            

                
                    <div class="form-group">
                        {!! $errors->first('productNumber', '< class="alert alert-warning">:message</p>') !!}
                        <label for="productNumber">{{ trans('products::product.product_number') }}</label>
                        @if(config('products.productNumber.autoIncrements'))
                            <p class="help-block">{{ trans('products::product.product_number_auto_increments') }}</p>
                            
                        @else
                            <input type="number" name="productNumber" id="productNumber" value="{{ old('productNumber') ,100000}}" class="form-control" required>
                            <p class="help-block">{{ trans('webshop-cms::forms.must_be_unique') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="productTypeId">{{ trans('products::product.product_type') }}</label>
                        <select name="productTypeId" id="productTypeId" class="form-control" required>
                            <option value=""></option>
                            @foreach($productTypes as $productType)
                                <option value="{{ $productType->id }}"{{ $productType->id == old('product_type_id') ? ' selected' : '' }}>
                                    {{ $productType->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! $errors->first('description', '<p class="alert alert-warning">:message</p>') !!}
                        <label for="description">{{ trans('products::product.description') }}</label>
                        <input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control" required>
                    </div>
                    
                        <a id="editproduct" class="btn btn-primary" data-url="{{route('frontend.products_create') }}">Submit</a>
                    </div>
             
    </form>
<script>

    (function($){
        $(document).ready(function(){
            $('#editproduct').on('click',function(e){
                e.preventDefault();
                url = $(this).attr('data-url');
                description = $('#description').val();
                producttypeid = $( "#productTypeId option:selected" ).val();
                console.log(producttypeid);
                $.post(url,{productTypeId:producttypeid,description:description}).done(function(data){
                    $('#edit_product_form').html(data);
                });
            });
        });
    })(jQuery);


</script>
</div>

