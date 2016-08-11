<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\ProductCategory;

class ProductCategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $productCategories = ProductCategory::all();
        return view('admin.productCategory.index')
                        ->with('productCategories', $productCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.productCategory.create');
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
        ]);

        $input = $request->all();
        ProductCategory::create($input);

        Session::flash('flash_message', 'Product Category successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $productCategory = ProductCategory::findOrFail($id);
        return view('admin.productCategory.show')->with('productCategory', $productCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $productCategory = ProductCategory::findOrFail($id);
        return view('admin.productCategory.edit')->with('productCategory', $productCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $productCategory = ProductCategory::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $input = $request->all();
        $productCategory->update($input);

        Session::flash('flash_message', 'Product Category successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $productCategory = ProductCategory::findOrFail($id);

        $productCategory->delete();

        Session::flash('flash_message', 'Product Category successfully deleted!');

        return redirect()->action('ProductCategoryController@index');
    }

}
