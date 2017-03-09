<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
in blade.php
<div class="form-group">
    <div class="checkbox">
        <label>
            <input type="checkbox" name="isMultiValue" value="1"{{ $attribute->is_multi_value ? ' checked disabled' : '' }}>
            {{ trans('products::attribute.is_multi_value') }}
        </label>
    </div>
</div>
<div id="attribute_value_index">
    @include('frontend.attribute.value.index')
</div>
