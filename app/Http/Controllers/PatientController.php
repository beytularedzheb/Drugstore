<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Patient;

class PatientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $patients = Patient::all();
        return view('admin.patient.index')
                        ->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.patient.create');
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
            'disease' => 'required',
            'ward_id' => 'required|exists:wards,id'
        ]);

        $input = $request->all();
        Patient::create($input);

        Session::flash('flash_message', 'Patient successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $patient = Patient::findOrFail($id);
        return view('admin.patient.show')->with('patient', $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $patient = Patient::findOrFail($id);
        return view('admin.patient.edit')->with('patient', $patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $patient = Patient::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'disease' => 'required',
            'ward_id' => 'required|exists:wards,id'
        ]);

        $input = $request->all();
        $patient->update($input);

        Session::flash('flash_message', 'Patient successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $patient = Patient::findOrFail($id);

        $patient->delete();

        Session::flash('flash_message', 'Patient successfully deleted!');

        return redirect()->action('PatientController@index');
    }

}
