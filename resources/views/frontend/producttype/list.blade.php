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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
<h1>Product type List</h1>
<table class="table">
    <thead>
    <th>Id</th>
    <th>Type</th>
    <th>Create At</th>
    <th>Update At</th>
    <th>Deleted At</th>
    <th>Options>
    </thead>
    @foreach ($prducttypes as $type)
    <tr><td>{{ $type->id }}</td>
    <td>{{ $type->description }}</td>
    <td>{{ $type->created_at }}</td>
    <td>{{ $type->updated_at }}</td>
    <td>{{ $type->deleted_at }}</td>
    <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['frontend.product_types_delete', $type->id], 'onsubmit' => 'ConfirmDelete()','title'=>'delete','style'=>'display:inline-block']) !!}
            {!! Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'delete')) !!}
        {!! Form::close() !!}
        <button class="update_product_type" data-url="{{ route('frontend.product_types_update_get',[$type->id]) }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
</td>
    </tr>
    @endforeach
</table>
<div><button id='newproducttype' class="btn btn-primary bt-lg" data-toggle="modal" data-target="#myModal">New Product Type</button></div>
@endsection

