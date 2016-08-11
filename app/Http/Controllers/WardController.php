<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Ward;

class WardController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $wards = Ward::all();
        return view('admin.ward.index')
                        ->with('wards', $wards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.ward.create');
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
            'uic' => 'required|unique:wards|max:13|min:9',
            'accountable_person_name' => 'required|max:255'
        ]);

        $input = $request->all();
        Ward::create($input);

        Session::flash('flash_message', 'Ward successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $ward = Ward::findOrFail($id);
        return view('admin.ward.show')->with('ward', $ward);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $ward = Ward::findOrFail($id);
        return view('admin.ward.edit')->with('ward', $ward);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $ward = Ward::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'uic' => 'required|max:13|min:9',
            'accountable_person_name' => 'required|max:255'
        ]);

        $input = $request->all();
        $ward->update($input);

        Session::flash('flash_message', 'Ward successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $ward = Ward::findOrFail($id);

        $ward->delete();

        Session::flash('flash_message', 'Ward successfully deleted!');

        return redirect()->action('WardController@index');
    }

}
