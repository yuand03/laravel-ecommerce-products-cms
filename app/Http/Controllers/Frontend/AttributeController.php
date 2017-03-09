<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Speelpenning\Contracts\Products\Repositories\AttributeRepository;
use Speelpenning\Contracts\Products\Repositories\AttributeValueRepository;
use Speelpenning\Products\Http\Requests\UpdateAttributeRequest;
use Speelpenning\Products\Jobs\StoreAttribute;
use Speelpenning\Products\Jobs\UpdateAttribute;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, AttributeRepository $attributeRepository)
    {
       // dd($attributeRepository->query());
        $attributes = $attributeRepository->query($request->get('q'));
        return view('frontend.attribute.index')
            ->with('attributes', $attributes)
            ->with('q', $request->get('q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $attribute = $this->dispatch(new StoreAttribute($request->get('description'), $request->get('type')));
        //return redirect()->back();
return redirect(route('frontend.attribute.edit', $attribute->id));
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
    public function edit(AttributeRepository $attributeRepository, AttributeValueRepository $attributeValueRepository, $id)
    {
        
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        { 
            $attribute = $attributeRepository->find($id);
        return view('frontend.attribute.edit')
            ->with('attribute', $attribute)
            ->with('attributeValues', $attributeValueRepository->getByAttribute($attribute));
        }else{
            $attribute = $attributeRepository->find($id);
        return view('frontend.attribute.edit_no_ajax')
            ->with('attribute', $attribute)
            ->with('attributeValues', $attributeValueRepository->getByAttribute($attribute));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateAttributeRequest $request, $id)
    {
         
         $attribute = $this->dispatch(
            new UpdateAttribute($id, $request->get('description'),
                $request->get('maxlength'), $request->get('autocomplete'), $request->get('placeholder'), $request->get('pattern'),
                $request->get('min'), $request->get('max'), $request->get('step'), $request->get('unitOfMeasurement'), $request->get('isMultiValue')));
        return redirect(route('frontend.attribute.edit', $attribute->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
