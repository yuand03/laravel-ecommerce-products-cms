<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//dd("000");
?>
@extends('frontend.layouts.app')

@section('content')
<h1>Update A Product type</h1>

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
              'placeholder'=> $productType->description  )) !!}
</div>
<legend>{{ trans('products::attribute.index') }}</legend>
                    @include('frontend.producttype.attribute.index')
<div class="form-group">
    {!! Form::submit('Submit', 
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
@endsection
