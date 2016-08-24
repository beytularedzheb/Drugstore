<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Product;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::all();
        return view('admin.product.index')
                        ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255',
            'unit_price_in_leva' => 'required|numeric|min:0',
            'unit' => 'required|max:45',
            'available_quantity' => 'required|numeric|min:0',
            'category_id' => 'required|exists:product_categories,id',
            'storehouse_id' => 'required|exists:storehouses,id',
        ]);

        $input = $request->all();
        Product::create($input);

        Session::flash('flash_message', trans('messages.product_added'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('admin.product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('admin.product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'unit_price_in_leva' => 'required|numeric|min:0',
            'unit' => 'required|max:45',
            'available_quantity' => 'required|numeric|min:0',
            'category_id' => 'required|exists:product_categories,id',
            'storehouse_id' => 'required|exists:storehouses,id',
        ]);

        $input = $request->all();
        $product->update($input);

        Session::flash('flash_message', trans('messages.product_updated'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::findOrFail($id);

        $product->delete();

        Session::flash('flash_message', trans('messages.product_deleted'));

        return redirect()->action('ProductController@index');
    }

}
