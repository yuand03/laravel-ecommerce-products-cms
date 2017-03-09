<input type="text" name="attributes[{{ $attribute->id }}]" id="attributes[{{ $attribute->id }}]" value="{{ $value }}"
       @if($attribute->autocomplete) autocomplete="{{ $attribute->autocomplete }}" @endif
       @if($attribute->maxlength) maxlength="{{ $attribute->maxlength }}" @endif
       @if($attribute->pattern) pattern="{{ $attribute->pattern }}" @endif
       @if($attribute->placeholder) placeholder="{{ $attribute->placeholder }}" @endif
       {{ $required }}
       class="form-control">