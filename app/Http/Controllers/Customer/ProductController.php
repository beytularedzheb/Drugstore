<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use App\Http\Controllers\Controller;

class ProductController extends Controller {

    public function getIndex() {
        $products = Product::all();
        $productCategories = ProductCategory::all();

        return view('customer.product.index')
                        ->with('products', $products)
                        ->with('productCategories', $productCategories)
                        ->with('selected_categories', null);
    }

    public function getShow($id) {
        $product = Product::findOrFail($id);
        return view('customer.product.show')->with('product', $product);
    }

    public function postIndex(Request $request) {
        $input_categories = $request->input('selected_category');

        if ($input_categories == null || count($input_categories) === 0) {
            return $this->getIndex();
        } else {
            $productCategories = ProductCategory::find($input_categories);

            if ($productCategories == null || count($productCategories) === 0) {
                return $this->getIndex();
            } else {
                $result = collect();
                foreach ($productCategories as $cat) {
                    $result = $result->merge($cat->products);
                }
                $productCategoriesDB = ProductCategory::all();

                return view('customer.product.index')
                                ->with('products', $result)
                                ->with('productCategories', $productCategoriesDB)
                                ->with('selected_categories', $productCategories);
            }
        }
    }

}
