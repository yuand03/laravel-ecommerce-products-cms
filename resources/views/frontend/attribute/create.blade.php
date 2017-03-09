<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<form action="{{ route('frontend.attribute.store') }}" method="post">
        {!! csrf_field() !!}
        {!! method_field('post') !!}


        

            <h1>{{ trans('products::attribute.create') }}</h1>

            
                <div class="form-group">
                    {!! $errors->first('description', '<p class="alert alert-warning">:message</p>') !!}
                    <label for="description">{{ trans('products::attribute.description') }}</label>
                    <input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control" required>
                    
                </div>
                <div class="form-group">
                    {!! $errors->first('type', '<p class="alert alert-warning">:message</p>') !!}
                    <label for="type">{{ trans('products::attribute.type') }}</label>
                    <div>
                        @foreach(Speelpenning\Products\Attribute::getAllowedTypes() as $type)
                            <div class="radio-inline">
                                <label for="type[{{ $type }}]">
                                    <input type="radio" name="type" id="type[{{ $type }}]" value="{{ $type }}" {{ old('type') == $type ? 'checked' : '' }} required>
                                    {{ trans('products::attribute.' . $type) }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
           
            {!! Form::submit('submit')!!}

       
    </form>
