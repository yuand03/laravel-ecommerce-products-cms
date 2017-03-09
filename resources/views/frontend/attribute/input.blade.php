<div class="form-group">
    <label for="attributes[{{ $attribute->id }}]">{{ $attribute->description }}</label>
    @include('frontend.attribute.input.' . $attribute->type, [
        'name' => "attributes[{$attribute->id}]",
        'required' => $attribute->pivot->required ? 'required' : false,
        'value' => $value,
        ])
</div>

