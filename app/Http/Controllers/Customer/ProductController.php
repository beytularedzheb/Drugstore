<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller {

    public function index() {
        $products = Product::all();
        
        return view('customer.product.index')
                        ->with('products', $products);
    }
    
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('customer.product.show')->with('product', $product);
    }
}
