<legend>{{ trans('products::attribute-value.index') }}</legend>
dddd
<ul class="list-unstyled">
    @foreach($attributeValues as $attributeValue)
        <li>
            <a href="{{ route('frontend.attribute-value.edit', [$attribute->id, 'attributevalueid='.$attributeValue->id]) }}">
                {{ $attributeValue->value }}
            </a>
        </li>
    @endforeach
</ul>

<div id="add_attribute_value" class="btn btn-link" data-url="{{ route('frontend.attribute-value.create', 'id='.$attribute->id) }}">
    
    <i class="glyphicon glyphicon-plus"></i>
    {{ trans('products::attribute-value.create') }}
</div>

