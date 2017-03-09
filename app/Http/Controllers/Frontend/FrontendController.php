<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Speelpenning\Contracts\Products\Repositories\ProductRepository;
use Speelpenning\Contracts\Products\Repositories\ProductTypeRepository;
use Speelpenning\Products\Http\Requests\StoreProductRequest;
use Speelpenning\Products\Http\Requests\UpdateProductRequest;
use Speelpenning\Products\Product;
use Speelpenning\Products\ProductNumber;
use Speelpenning\Products\Jobs\StoreProduct;
use Speelpenning\Products\Jobs\UpdateProduct;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(ProductRepository $productRepository)
    {
        return view('frontend.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
