<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ProductProvider;

class ProductProviderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $productProviders = ProductProvider::all();
        return view('admin.productProvider.index')
                        ->with('productProviders', $productProviders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.productProvider.create');
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
            'uic' => 'required|unique:product_providers|max:13|min:9',
            'accountable_person_name' => 'required|max:255',
            'phone' => 'max:20'
        ]);

        $input = $request->all();
        ProductProvider::create($input);

        Session::flash('flash_message', trans('messages.provider_added'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $productProvider = ProductProvider::findOrFail($id);
        return view('admin.productProvider.show')->with('productProvider', $productProvider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $productProvider = ProductProvider::findOrFail($id);
        return view('admin.productProvider.edit')->with('productProvider', $productProvider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $productProvider = ProductProvider::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'uic' => 'required|unique:product_providers|max:13|min:9',
            'accountable_person_name' => 'required|max:255',
            'phone' => 'max:20'
        ]);

        $input = $request->all();
        $productProvider->update($input);

        Session::flash('flash_message', trans('messages.provider_updated'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $productProvider = ProductProvider::findOrFail($id);

        $productProvider->delete();

        Session::flash('flash_message', trans('messages.provider_deleted'));

        return redirect()->action('ProductProviderController@index');
    }

}
