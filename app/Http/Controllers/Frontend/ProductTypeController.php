<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Speelpenning\Products\Repositories\ProductTypeRepository;
use Speelpenning\Products\Repositories\AttributeRepository;
use Speelpenning\Products\Http\Requests\StoreProductTypeRequest;
use Speelpenning\Products\Http\Requests\UpdateProductTypeRequest;
use Speelpenning\Products\ProductType;
use Speelpenning\Products\Jobs\UpdateProductType;
use App\Http\Controllers\Controller;

class ProductTypeController extends Controller
{
    private  $productTypeRepository;
    public function __construct(ProductTypeRepository $productTypeRepository) {
        $this->productTypeRepository = $productTypeRepository;
    }
    public function create_get(){
        //dd($_SERVER['HTTP_X_REQUESTED_WITH']);
        return view('frontend.producttype.create_get');
        
    }
    
    public function listed(){
        $all = $this->productTypeRepository->all();
        $callback = function($type)
            {
              return $type->id;
            };
        $all = $all->sortBy($callback, SORT_REGULAR, false);

        return view('frontend.producttype.list',['prducttypes'=>$all]);
        
    }
    
    public function create_post(Request $request,AttributeRepository $attributeRepository){
        $tempProductType = ProductType::instantiate($request->get('description'));
      $tempProductType->save();
       $productType = $this->productTypeRepository->find($tempProductType->id);
        //$productType = $productTypeRepository->find($id);
        $attributes = $attributeRepository->getByProductType($productType);
        
            return view('frontend.producttype.update_get')
        ->with('productType', $productType)
            ->with('attributes', $attributeRepository->all())
            ->with('assignedAttributes', $attributes->pluck('id')->toArray())
            ->with('requiredAttributes', $attributes->filter(function ($attribute) {
                return $attribute->pivot->required;
            })->pluck('id')->toArray());
        //return redirect(route('frontend.product_types_update_get', $tempProductType->id));
        //$productType = $this->dispatch(new StoreProductType($request->get('description')));
        //return redirect(route('frontend.producttype.update_get', $productType->id));
        
        
    }
    public function delete($id){
        $type =$this->productTypeRepository->find($id);
        $this->productTypeRepository->destroy($type);
        return redirect()->back();
        
    }
    public function update_get( AttributeRepository $attributeRepository,$id){
        $productType = $this->productTypeRepository->find($id);
        //$productType = $productTypeRepository->find($id);
        $attributes = $attributeRepository->getByProductType($productType);
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        { 
            return view('frontend.producttype.update_get')
        ->with('productType', $productType)
            ->with('attributes', $attributeRepository->all())
            ->with('assignedAttributes', $attributes->pluck('id')->toArray())
            ->with('requiredAttributes', $attributes->filter(function ($attribute) {
                return $attribute->pivot->required;
            })->pluck('id')->toArray());
        }else{
            return view('frontend.producttype.update_get_no_ajax')
        ->with('productType', $productType)
            ->with('attributes', $attributeRepository->all())
            ->with('assignedAttributes', $attributes->pluck('id')->toArray())
            ->with('requiredAttributes', $attributes->filter(function ($attribute) {
                return $attribute->pivot->required;
            })->pluck('id')->toArray());
        }
        
         
    }
    public function update_put(Request $request,AttributeRepository $attributeRepository){
        
        $this->dispatch(
            new UpdateProductType($request->id, $request->get('description'), $request->get('attributes', []),
                $request->get('requiredAttributes', [])));
       // die('here');
        //return redirect(route('frontend.product_types_update_get', $request->id));
        $productType = $this->productTypeRepository->find($request->id);
        //die('here');
        $attributes = $attributeRepository->getByProductType($productType);
        return 'success';
        /*
        return view('frontend.producttype.update_get')
        ->with('productType', $productType)
            ->with('attributes', $attributeRepository->all())
            ->with('assignedAttributes', $attributes->pluck('id')->toArray())
            ->with('requiredAttributes', $attributes->filter(function ($attribute) {
                return $attribute->pivot->required;
            })->pluck('id')->toArray());
        
         */
            
        
    }
}
