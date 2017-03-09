<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('frontend.layouts.app')

@section('content')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<h1>Product List</h1>
<table class="table">
    <thead>
    <th>Id</th>
    <th>SKU</th>
    <th>ProductType</th>
    
    <th>Description</th>
    <th>Create At</th>
    <th>Options<th>
    </thead>
    @foreach ($prducts as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->product_number }}</td>
            <td>{{ $product->productType->description }}</td>

            <td>{{ $product->description }}</td>
            <td>{{ $product->created_at }}</td>

            <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['frontend.products_delete', $product->id], 'onsubmit' => 'ConfirmDelete()','title'=>'delete','style'=>'display:inline-block']) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'delete')) !!}
                {!! Form::close() !!}
                <button class="update_product" data-url="{{ route('frontend.products_update_get',[$product->id]) }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
            </td>
        </tr>
    @endforeach
</table>
<div><button id='newproduct' class="btn btn-primary bt-lg" data-toggle="modal" data-target="#myModal">New Product</button></div>
@endsection

