<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Storehouse;

class StorehouseController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $storehouses = Storehouse::all();
        return view('admin.storehouse.index')
                        ->with('storehouses', $storehouses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.storehouse.create');
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
            'phone' => 'max:20',
            'pharmacy_id' => 'required|exists:pharmacies,id',
        ]);

        $input = $request->all();
        Storehouse::create($input);

        Session::flash('flash_message', 'Storehouse successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $storehouse = Storehouse::findOrFail($id);
        return view('admin.storehouse.show')->with('storehouse', $storehouse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $storehouse = Storehouse::findOrFail($id);
        return view('admin.storehouse.edit')->with('storehouse', $storehouse);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $storehouse = Storehouse::findOrFail($id);

        $this->validate($request, [
            'name' => 'max:255',
            'phone' => 'max:20',
            'pharmacy_id' => 'required|exists:pharmacies,id',
        ]);

        $input = $request->all();
        $storehouse->update($input);

        Session::flash('flash_message', 'Storehouse successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $storehouse = Storehouse::findOrFail($id);

        $storehouse->delete();

        Session::flash('flash_message', 'Storehouse successfully deleted!');

        return redirect()->action('StorehouseController@index');
    }

}
