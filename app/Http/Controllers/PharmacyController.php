<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Pharmacy;

class PharmacyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pharmacies = Pharmacy::all();
        return view('admin.pharmacy.index')
                        ->with('pharmacies', $pharmacies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.pharmacy.create');
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
            'uic' => 'required|unique:pharmacies|max:13|min:9',
            'accountable_person_name' => 'required|max:255',
            'phone' => 'max:20'
        ]);

        $input = $request->all();
        Pharmacy::create($input);

        Session::flash('flash_message', trans('messages.pharmacy_successfully_added'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $pharmacy = Pharmacy::findOrFail($id);

        return view('admin.pharmacy.show')->with('pharmacy', $pharmacy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pharmacy = Pharmacy::findOrFail($id);
        return view('admin.pharmacy.edit')->with('pharmacy', $pharmacy);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $pharmacy = Pharmacy::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'uic' => 'required|max:13|min:9',
            'accountable_person_name' => 'required|max:255',
            'phone' => 'max:20'
        ]);

        $input = $request->all();
        $pharmacy->update($input);

        Session::flash('flash_message', trans('messages.pharmacy_successfully_updated'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $pharmacy = Pharmacy::findOrFail($id);

        $pharmacy->delete();

        Session::flash('flash_message', trans('messages.pharmacy_successfully_deleted'));

        return redirect()->action('PharmacyController@index');
    }

}
