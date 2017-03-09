<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Speelpenning\Contracts\Products\Repositories\AttributeRepository;
use Speelpenning\Contracts\Products\Repositories\AttributeValueRepository;
use Speelpenning\Products\Http\Requests\StoreAttributeValueRequest;
use Speelpenning\Products\Http\Requests\UpdateAttributeRequest;
use Speelpenning\Products\Jobs\StoreAttributeValue;
use Speelpenning\Products\Jobs\UpdateAttribute;
use Speelpenning\Products\Jobs\DestroyAttributeValue;
use Speelpenning\Products\Jobs\UpdateAttributeValue;

class AttributeValueController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AttributeRepository $attributeRepository, Request $request)
    {
        //dd($request);
        //dd($attributeId);
        return view('frontend.attribute.value.create')
            ->with('attribute', $attributeRepository->find($request->id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,AttributeRepository $attributeRepository, AttributeValueRepository $attributeValueRepository)
    {
        //dd($request);
        $attributeId = $request->id;
        
       
        //dd($attributeId);
        $this->dispatch(new StoreAttributeValue($attributeId, $request->get('value')));
         $attribute = $attributeRepository->find($attributeId);
        $attributeValues = $attribute->attributeValues;
        //$attributeValues = $attribute->attributeValues;
        //$attributeValues = $attribute->attributeValues;
        //dd($attributeValues);
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        { 
            //dd('iiiiii');
            //dd(view('frontend.attribute.valuwithe.index')->with('attributeValues',$attributeValues ));
            return view('frontend.attribute.value.index')
                    ->with('attributeValues',$attributeValues )
                    ->with('attribute',$attribute);
        }else{
            return redirect(route('frontend.attribute.edit', $attributeId));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeRepository $attributeRepository, AttributeValueRepository $attributeValueRepository,
                         Request $request,$attributeId)
    {
        $attributeValue = $attributeValueRepository->find($request->attributevalueid);
        $attribute = $attributeRepository->find($attributeId);
        return view('frontend.attribute.value.edit')
            ->with('attributeValue', $attributeValue)
            ->with('attribute', $attribute);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id,AttributeRepository $attributeRepository, AttributeValueRepository $attributeValueRepository)
    {
         
         $this->dispatch(new UpdateAttributeValue($request->attributevalueid, $request->get('value')));
         //dd( $request->attributevalueid);
         $attribute = $attributeRepository->find($id);
        $attributeValues = $attribute->attributeValues;
         
        return view('frontend.attribute.value.index')
                    ->with('attributeValues',$attributeValues )
                    ->with('attribute',$attribute);
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,AttributeRepository $attributeRepository, AttributeValueRepository $attributeValueRepository)
    {
       
        $attributeid = $attributeValueRepository->find($id)->attribute_id;
       
       
        $this->dispatch(new DestroyAttributeValue($id));
        $attribute = $attributeRepository->find($attributeid);
        $attributeValues = $attribute->attributeValues;
        //dd($attributeValues);
        return view('frontend.attribute.value.index')
                    ->with('attributeValues',$attributeValues )
                    ->with('attribute',$attribute);
    }
}
