<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
numberic.blade.php
<div class="form-group">
    {!! $errors->first('unitOfMeasurement', '<p class="alert alert-warning">:message</p>') !!}
    <label for="unitOfMeasurement">{{ trans('products::attribute.unit_of_measurement') }}</label>
    <input type="text" name="unitOfMeasurement" id="unitOfMeasurement" value="{{ old('unitOfMeasurement', $attribute->unit_of_measurement) }}" maxlength="20" class="form-control">
</div>
<div class="form-group">
    {!! $errors->first('min', '<p class="alert alert-warning">:message</p>') !!}
    <label for="min">{{ trans('products::attribute.min') }}</label>
    <input type="number" name="min" id="min" step="any" value="{{ $attribute->min }}" class="form-control">
</div>
<div class="form-group">
    {!! $errors->first('max', '<p class="alert alert-warning">:message</p>') !!}
    <label for="max">{{ trans('products::attribute.max') }}</label>
    <input type="number" name="max" id="max" step="any" value="{{ $attribute->max }}" class="form-control">
</div>
<div class="form-group">
    {!! $errors->first('step', '<p class="alert alert-warning">:message</p>') !!}
    <label for="step">{{ trans('products::attribute.step') }}</label>
    <input type="number" name="step" id="step" value="{{ $attribute->step }}" min="0" step="any" class="form-control">
    <p class="help-block">{{ trans('products::attribute.step_help') }}</p>
</div>