<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\WardOrder;

class WardOrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $wardOrders = WardOrder::all();
        return view('admin.wardOrder.index')
                        ->with('wardOrders', $wardOrders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.wardOrder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'receiver_name' => 'max:255',
            'sender_name' => 'required|max:255',
            'state' => 'in:confirmed,rejected,sent',
            'requester_id' => 'required|exists:wards,id',
            'requested_from_id' => 'required|exists:pharmacies,id',
            'requested_for_id' => 'required|exists:patients,id'
        ]);

        $input = $request->all();
        $id = WardOrder::create($input)->id;
        
        $wardOrder = WardOrder::find($id);
        $wardOrder->issue_date = \Carbon\Carbon::now();
        $wardOrder->state = null;
        $wardOrder->save();
        
        Session::flash('flash_message', trans('messages.order_successfully_added'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $wardOrder = WardOrder::findOrFail($id);
        return view('admin.wardOrder.show')->with('wardOrder', $wardOrder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $wardOrder = WardOrder::findOrFail($id);
        return view('admin.wardOrder.edit')->with('wardOrder', $wardOrder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $wardOrder = WardOrder::findOrFail($id);

        $this->validate($request, [
            'receiver_name' => 'max:255',
            'sender_name' => 'required|max:255',
            'state' => 'in:confirmed,rejected,sent',
            'requester_id' => 'required|exists:wards,id',
            'requested_from_id' => 'required|exists:pharmacies,id',
            'requested_for_id' => 'required|exists:patients,id'
        ]);

        $input = $request->all();
        $wardOrder->update($input);

        Session::flash('flash_message', trans('messages.order_successfully_updated'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $wardOrder = WardOrder::findOrFail($id);

        $wardOrder->delete();

        Session::flash('flash_message', trans('messages.order_successfully_deleted'));

        return redirect()->action('WardOrderController@index');
    }
}
