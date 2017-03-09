<legend>{{ trans('products::attribute-value.index') }}</legend>

<ul class="list-unstyled">
    @foreach($attributeValues as $attributeValue)
        <li>
            <a href="{{ route('frontend.attribute-value.edit', [$attribute->id, 'attributevalueid='.$attributeValue->id]) }}">
                {{ $attributeValue->value }}
            </a>
            <button class="delete_value" data-url="{{ route('frontend.attribute-value.destroy',[$attributeValue->id]) }}" ><i class="fa fa-trash"></i></button>
            
            <button class="edit_value" data-url="{{ route('frontend.attribute-value.edit',[$attribute->id, 'attributevalueid='.$attributeValue->id]) }}" ><i class="fa fa-pencil-square-o"></i></button>
            
        </li>
    @endforeach
</ul>

<div id="add_attribute_value" class="btn btn-link" data-url="{{ route('frontend.attribute-value.create', 'id='.$attribute->id) }}">
    
    <i class="glyphicon glyphicon-plus"></i>
    {{ trans('products::attribute-value.create') }}
</div>
<script>
 (function($){
     $(document).ready(function(){
         $(".delete_value").on('click',function(e){
             e.preventDefault()
            url = $(this).attr('data-url');
            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(data) {
                  $( "#attribute_value_index" ).html( data );
                  $( "#place_form" ).html('');
                }
              });
        
        });
         $(".edit_value").on('click',function(e){
              e.preventDefault()
            url = $(this).attr('data-url');
            $.get( url, function( data ) {
                console.log(data);
            $( "#place_form" ).html( data );

            });
        });
         
     });
 })(jQuery);
</script>
