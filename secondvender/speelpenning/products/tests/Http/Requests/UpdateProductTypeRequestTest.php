<?php

use Speelpenning\Products\Http\Requests\UpdateProductTypeRequest;

class UpdateProductTypeRequestTest extends TestCase
{
    public function testValidationRules()
    {
        $request = new UpdateProductTypeRequest();

        $this->assertTrue($request->authorize());
        $this->assertEquals([
            'description' => ['required', 'string', 'unique:product_types,description,'.$request->route('product_type'), 'max:40'],
            'attributes' => ['sometimes', 'array'],
            'required' => ['sometimes', 'array'],
        ], $request->rules());
    }
}
