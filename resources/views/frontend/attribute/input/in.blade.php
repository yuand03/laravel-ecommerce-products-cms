<select name="{{ $name }}" id="{{ $name }}" {{ $required }} class="form-control">
    <option></option>
    @foreach($attribute->attributeValues->sortBy('description') as $option)
        <option value="{{ $option->id }}"{{ $option->id == $value ? ' selected' : '' }}>
            {{ $option->value }}
        </option>
    @endforeach
</select>