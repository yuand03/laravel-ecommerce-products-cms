@if($attribute->unit_of_measurement) <div class="input-group"> @endif

<input type="number" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
       @if($attribute->min) min="{{ $attribute->min }}" @endif
       @if($attribute->max) max="{{ $attribute->max }}" @endif
       step="{{ $attribute->step or 'any' }}"
       {{ $required }}
       class="form-control">

@if($attribute->unit_of_measurement)
    <span class="input-group-addon">{{ $attribute->unit_of_measurement }}</span>
</div>
@endif