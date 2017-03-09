<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table class="table">
    <thead>
        <tr>
            <th>{{ trans('products::product-type.bind_attribute') }}</th>
            <th>{{ trans('products::attribute.description') }}</th>
            <th>{!! trans('products::attribute.uom') !!}</th>
            <th>{{ trans('products::product-type.attribute_required') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attributes as $attribute)
            <tr>
                <td class="text-center"><input type="checkbox" name="attributes[]" id="attribute-{{ $attribute->id }}" value="{{ $attribute->id }}" {{ in_array($attribute->id, $assignedAttributes) ? 'checked' : '' }}></td>
                <td>{{ $attribute->description }}</td>
                <td>{{ $attribute->unit_of_measurement }}</td>
                <td class="text-center"><input type="checkbox" name="requiredAttributes[]" id="required-attribute-{{ $attribute->id }}" value="{{ $attribute->id }}" {{ in_array($attribute->id, $requiredAttributes) ? 'checked' : '' }}></td>
            </tr>
        @endforeach
    </tbody>
</table>

