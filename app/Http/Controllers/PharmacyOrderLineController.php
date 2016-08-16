<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\PharmacyOrderLine;
use App\Product;

/* Consider about updating product availabla quantity */
class PharmacyOrderLineController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pharmacyOrderLines = PharmacyOrderLine::all();
        return view('admin.pharmacyOrderLine.index')
                        ->with('pharmacyOrderLines', $pharmacyOrderLines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.pharmacyOrderLine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $product = Product::findOrFail($request->input('product_id'));
        
        $max_quantity = $product->available_quantity;
        
        $this->validate($request, [
            'pharmacy_order_id' => 'required|exists:pharmacy_orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:0.0001|max:' . $max_quantity,
        ]);

        $input = $request->all();
        $pharmacyOrderLine = PharmacyOrderLine::create($input);
        $pharmacyOrderLine->unit_price_in_leva = $product->unit_price_in_leva;
        $pharmacyOrderLine->save();
        
        $product->available_quantity -= $pharmacyOrderLine->quantity;
        $product->save();
        
        Session::flash('flash_message', 'Pharmacy Order Line successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $pharmacyOrderLine = PharmacyOrderLine::findOrFail($id);

        Session::flash('flash_message', 'PharmacyOrderLine successfully loaded!');
        return view('admin.pharmacyOrderLine.show')->with('pharmacyOrderLine', $pharmacyOrderLine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pharmacyOrderLine = PharmacyOrderLine::findOrFail($id);
        return view('admin.pharmacyOrderLine.edit')->with('pharmacyOrderLine', $pharmacyOrderLine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $pharmacyOrderLine = PharmacyOrderLine::findOrFail($id);
        $old_quantity = $pharmacyOrderLine->quantity;
        
        $product = Product::findOrFail($request->input('product_id'));
        $max_quantity = $product->available_quantity + $old_quantity;
        
        $this->validate($request, [
            'pharmacy_order_id' => 'required|exists:pharmacy_orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:0|max:' . $max_quantity,
        ]);

        $input = $request->all();
        $pharmacyOrderLine->update($input);
        
        if ($old_quantity !== $pharmacyOrderLine->quantity) {
            $product->available_quantity += ($old_quantity - $pharmacyOrderLine->quantity);
            $product->save();
        }

        Session::flash('flash_message', 'Pharmacy Order Line successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $pharmacyOrderLine = PharmacyOrderLine::findOrFail($id);
        $product = Product::findOrFail($pharmacyOrderLine->product_id);
        $product->available_quantity += $pharmacyOrderLine->quantity;
        
        $pharmacyOrderLine->delete();
        $product->save();
        
        Session::flash('flash_message', 'Pharmacy Order Line successfully deleted!');

        return redirect()->action('PharmacyOrderLineController@index');
    }

}
