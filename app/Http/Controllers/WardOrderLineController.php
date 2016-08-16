<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\WardOrderLine;
use App\Product;

class WardOrderLineController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $wardOrderLines = WardOrderLine::all();
        return view('admin.wardOrderLine.index')
                        ->with('wardOrderLines', $wardOrderLines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.wardOrderLine.create');
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
            'ward_order_id' => 'required|exists:ward_orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:0.0001|max:' . $max_quantity,
        ]);

        $input = $request->all();
        $wardOrderLine = WardOrderLine::create($input);
        $wardOrderLine->unit_price_in_leva = $product->unit_price_in_leva;
        $wardOrderLine->save();
        
        $product->available_quantity -= $wardOrderLine->quantity;
        $product->save();
        
        Session::flash('flash_message', 'Ward Order Line successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $wardOrderLine = WardOrderLine::findOrFail($id);

        Session::flash('flash_message', 'WardOrderLine successfully loaded!');
        return view('admin.wardOrderLine.show')->with('wardOrderLine', $wardOrderLine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $wardOrderLine = WardOrderLine::findOrFail($id);
        return view('admin.wardOrderLine.edit')->with('wardOrderLine', $wardOrderLine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $wardOrderLine = WardOrderLine::findOrFail($id);
        $old_quantity = $wardOrderLine->quantity;
        
        $product = Product::findOrFail($request->input('product_id'));
        $max_quantity = $product->available_quantity + $old_quantity;
        
        $this->validate($request, [
            'ward_order_id' => 'required|exists:ward_orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:0|max:' . $max_quantity,
        ]);

        $input = $request->all();
        $wardOrderLine->update($input);
        
        if ($old_quantity !== $wardOrderLine->quantity) {
            $product->available_quantity += ($old_quantity - $wardOrderLine->quantity);
            $product->save();
        }

        Session::flash('flash_message', 'Ward Order Line successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $wardOrderLine = WardOrderLine::findOrFail($id);
        $product = Product::findOrFail($wardOrderLine->product_id);
        $product->available_quantity += $wardOrderLine->quantity;
        
        $wardOrderLine->delete();
        $product->save();
        
        Session::flash('flash_message', 'Ward Order Line successfully deleted!');

        return redirect()->action('WardOrderLineController@index');
    }

}
