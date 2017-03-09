<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Speelpenning\Contracts\Products\Product;
//use Speelpenning\Products\Product;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product) {
        $this->product = $product;
    }

}
