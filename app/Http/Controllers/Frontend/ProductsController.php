<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Speelpenning\Contracts\Products\Repositories\ProductRepository;
use Speelpenning\Contracts\Products\Repositories\ProductTypeRepository;
use Speelpenning\Products\Http\Requests\StoreProductRequest;
use Speelpenning\Products\Http\Requests\UpdateProductRequest;
use Speelpenning\Products\Product;
use Speelpenning\Products\ProductNumber;
use Speelpenning\Products\Jobs\StoreProduct;
use Speelpenning\Products\Jobs\UpdateProduct;
use App\Http\Controllers\Controller;



class ProductsController extends Controller
{
    private  $productRepository;
    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }
    
    public function listed() {
        $all = $this->productRepository->all();
        $callback = function($type) {
            return $type->id;
        };
        $all = $all->sortBy($callback, SORT_REGULAR, false);

        return view('frontend.product.list', ['prducts' => $all]);
    }

    
    public function create_get(ProductTypeRepository $productTypeRepository){
        return view('frontend.product.create_get')->with('productTypes', $productTypeRepository->all());
        
    }
     public function create_post(Request $request,ProductTypeRepository $productTypeRepository){
         //dd(config('products.productNumber.autoIncrements'));
        // dd($request);
         $productnum = 100001;
         //dd($this->productRepository->all()->isEmpty());
         if(config('products.productNumber.autoIncrements')){
            if($this->productRepository->all()->isEmpty()){
                
            }else{
                $id =$this->productRepository->all()->max('id');
                //dd($this->productRepository->all()->max('id'));
                $productnum +=$id;
                //dd($productnum);
            }
         }
        $productnum = ProductNumber::parse($productnum);
        //$productTypeId = $productTypeRepository->find($request->get('productTypeId'));
        //$tempProduct = Product::instantiate($productnum,$productTypeId,$request->get('description'));
       // $this->productRepository->save($tempProduct);
       //s return redirect()->back();
        
        $product = $this->dispatch(
            new StoreProduct($productnum, $request->get('productTypeId'),
                $request->get('description')));
        //dd($product);
        return view('frontend.product.update_get')
                ->with('product',$product)
                ->with('productTypes',$productTypeRepository->all());
        
    }
    public function delete($id){
        $type =$this->productRepository->find($id);
        $this->productRepository->destroy($type);
        return redirect()->back();
        
    }
    public function update_get($id,ProductTypeRepository $productTypeRepository){
        $mproduct = $this->productRepository->find($id);
        
         return view('frontend.product.update_get',['product'=>$mproduct,'productTypes'=>$productTypeRepository->all()]);
        
        
    }
    public function update_put(Request $request,ProductTypeRepository $productTypeRepository){
        //die('here');
        //dd($request->get('productnumber'));
        //$product = $this->productRepository->find($request->get('id'));
        //$productnum = ProductNumber::parse($request->get('productNumber'));
        //$productTypeId = $productTypeRepository->find($request->get('productTypeId'));
        //$product->fill(['product_number'=>$productnum,'product_type_id'=>$request->get('productTypeId'),'description'=>$request->get('description')]);
        //$this->productRepository->save($product);
        //return redirect()->back();
        $attributes = ($request->get('attributes'))==null? [] : $request->get('attributes');
        //dd($request);
        $filesshellarray = $request->file('attributes')==null?[]:$request->file('attributes');
        $key='';
        $fileNames=[];
        foreach($filesshellarray as  $attributeid => $files){
           $key=$attributeid ;
           foreach ($files as $index=>$file){
               $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                $destinationPath = base_path() . '\public\images';
                $file->storeAs('public\images',$picture);
                $fileNames[]=$picture;
                
           }
        }
        if($key==''|| sizeof($fileNames)==0){
            
        }else{
        $attributes[$key]= serialize( $fileNames );
        }
        $product = $this->dispatch(new UpdateProduct($request->id, $request->get('description'),$attributes ));
        return redirect(route('frontend.products'));
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        { 
            return redirect(route('frontend.products'));
            return view('frontend.product.update_get_no_ajax')
                    ->with('product',$product)
                    ->with('productTypes',$productTypeRepository->all());
            
        }else{
            return redirect(route('frontend.products'));
            return view('frontend.product.update_get_no_ajax')
                    ->with('product',$product)
                    ->with('productTypes',$productTypeRepository->all());//redirect(route('frontend.products_update_get', $product->id));
        }
        
    }
    
}