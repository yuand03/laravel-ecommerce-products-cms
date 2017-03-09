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
   

    <div class="container-fluid">
        <h1>{{ trans('products::attribute.index') }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>{{ trans('products::attribute.description') }}</th>
                    <th>{{ trans('products::attribute.type') }}</th>
                    <th>{{ trans('products::attribute.unit_of_measurement') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attributes as $attribute)
                    <tr>
                        <td>
                            {{ $attribute->description }}
                        </td>
                        <td>
                            {{ trans('products::attribute.' . $attribute->type) }}
                        </td>
                        <td>
                            {{ $attribute->unit_of_measurement }}
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['frontend.attribute.destroy', $attribute->id], 'onsubmit' => 'ConfirmDelete()','title'=>'delete','style'=>'display:inline-block']) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'delete')) !!}
                {!! Form::close() !!}
                            <button class="edit_attribute" data-url="{{  route('frontend.attribute.edit', $attribute->id)  }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div><button id='newattribute' class="btn btn-primary bt-lg" data-toggle="modal" data-target="#myModal">New Attribute</button></div>

    </div>
@endsection
