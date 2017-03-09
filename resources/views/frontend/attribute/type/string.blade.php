<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<h1>string.blade.php</h1>
<div class="form-group">
    <label>{{ trans('products::attribute.disable_autocomplete') }}</label>
    <div class="checkbox">
        <label>
            <input type="radio" name="autocomplete" value="off" {{ $attribute->autocomplete == 'off' ? 'checked' : '' }}>
            {{ trans('shop/forms.yes') }}
        </label>
        <label>
            <input type="radio" name="autocomplete" value="" {{ $attribute->autocomplete != 'off' ? 'checked' : '' }}>
            {{ trans('shop/forms.no') }}
        </label>
    </div>
</div>
<div class="form-group">
    <label for="placeholder">{{ trans('products::attribute.placeholder') }}</label>
    <input type="text" name="placeholder" id="placeholder" value="{{ $attribute->placeholder }}" class="form-control">
</div>
<div class="form-group">
    <label for="maxlength">{{ trans('products::attribute.maxlength') }}</label>
    <input type="number" name="maxlength" id="maxlength" value="{{ $attribute->maxlength or '255' }}" min="1" maxlength="255" class="form-control">
</div>
<div class="form-group">
    <label for="pattern">{{ trans('products::attribute.pattern') }}</label>
    <input type="text" name="pattern" id="pattern" value="{{ $attribute->pattern }}" class="form-control">
    <p class="help-block">{{ trans('products::attribute.pattern_help') }}: <a href="http://php.net/manual/en/pcre.pattern.php" target="_blank">PHP: PCRE Patterns</a></p>
</div>