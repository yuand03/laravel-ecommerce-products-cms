<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>







<form action="{{ route('frontend.products_update_put') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! method_field('put') !!}

        <input type="hidden" name="id" id="id" value="{{ $product->id }}" class="form-control" required>
                    
            <h1>{{ trans('Edit  Product') }}</h1>

            

                
                    <div class="form-group">
                        {!! $errors->first('productNumber', '< class="alert alert-warning">:message</p>') !!}
                           <label for="productNumber">{{ trans('Product Number') }}</label>
                            <input type="number" name="productNumber" id="productNumber" value="{{ $product->product_number}}" class="form-control" required>
                           
                        
                    </div>
                    <div class="form-group">
                        <label for="productTypeId">{{ trans('products::product.product_type') }}</label>
                        <select name="productTypeId" id="productTypeId" class="form-control" required>
                            <option value=""></option>
                            @foreach($productTypes as $productType)
                                <option value="{{ $productType->id }}" {{ $productType->id == $product->productType->id ? ' selected' : '' }}>
                                    {{ $productType->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! $errors->first('description', '<p class="alert alert-warning">:message</p>') !!}
                        <label for="description">{{ trans('products::product.description') }}</label>
                        <input type="text" name="description" id="description" value="{{ $product->description }}" class="form-control" required>
                    </div>
                    
            <legend>{{ $product->productType->description }} {{ trans('products::attribute.index') }}</legend>
                    @foreach($product->productType->attributes->sortBy('description') as $attribute)
                        @include('frontend.attribute.input', [
                            'value' => is_null($product->attributes->where('id', $attribute->id)->first())
                                ? '' : $product->attributes->where('id', $attribute->id)->first()->pivot->value,
                        ])
                    @endforeach
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
             
    </form>

