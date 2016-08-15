<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\PharmacyOrder;

class PharmacyOrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pharmacyOrders = PharmacyOrder::all();
        return view('admin.pharmacyOrder.index')
                        ->with('pharmacyOrders', $pharmacyOrders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.pharmacyOrder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'receiver_name' => 'required|max:255',
            'sender_name' => 'required|max:255',
            'issuer_id' => 'required|exists:product_providers,id',
            'customer_id' => 'required|exists:pharmacies,id'
        ]);

        $input = $request->all();
        $id = PharmacyOrder::create($input)->id;
        
        $pharmacyOrder = PharmacyOrder::find($id);
        $pharmacyOrder->issue_date = \Carbon\Carbon::now();
        $pharmacyOrder->save();
        
        Session::flash('flash_message', 'Pharmacy Order successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $pharmacyOrder = PharmacyOrder::findOrFail($id);

        Session::flash('flash_message', 'PharmacyOrder successfully loaded!');
        return view('admin.pharmacyOrder.show')->with('pharmacyOrder', $pharmacyOrder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pharmacyOrder = PharmacyOrder::findOrFail($id);
        return view('admin.pharmacyOrder.edit')->with('pharmacyOrder', $pharmacyOrder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $pharmacyOrder = PharmacyOrder::findOrFail($id);

        $this->validate($request, [
            'receiver_name' => 'required|max:255',
            'sender_name' => 'required|max:255',
            'issuer_id' => 'required|exists:product_providers,id',
            'customer_id' => 'required|exists:pharmacies,id'
        ]);

        $input = $request->all();
        $pharmacyOrder->update($input);

        Session::flash('flash_message', 'Pharmacy Order successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $pharmacyOrder = PharmacyOrder::findOrFail($id);

        $pharmacyOrder->delete();

        Session::flash('flash_message', 'PharmacyOrder successfully deleted!');

        return redirect()->action('PharmacyOrderController@index');
    }

}
