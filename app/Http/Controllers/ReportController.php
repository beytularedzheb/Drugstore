<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ReportController extends Controller {

    public function getIndex() {
        return view('admin.report.index');
    }

    public function getOrdersByWard() {
        return view('admin.report.ordersbyward');
    }

    public function postOrdersByWard(Request $request) {
        $ward_id = $request->ward_id;
        if ($ward_id != null && $ward_id != "") {
            $ward = \App\Ward::find($ward_id);
            return view('admin.report.ordersbyward')->with('wardOrders', $ward->orders);
        }
        return redirect()->back();
    }

    public function getOrdersByPatient() {
        return view('admin.report.ordersbypatient');
    }

    public function postOrdersByPatient(Request $request) {
        $patient_id = $request->patient_id;
        if ($patient_id != null && $patient_id != "") {
            $patient = \App\Patient::find($patient_id);
            return view('admin.report.ordersbypatient')->with('orders', $patient->orders);
        }
        return redirect()->back();
    }

    public function getNotAvailableProducts() {
        return view('admin.report.notavailableproducts')->with('products', \App\Product::where('available_quantity', '=', 0)->get());
    }

    public function postNotAvailableProducts(Request $request) {
        $category_id = $request->category_id;
        if ($category_id != null && $category_id != "") {
            $products = \App\Product::where('available_quantity', '<=', 0)->where('category_id', $category_id)->get();
            return view('admin.report.notavailableproducts')->with('products', $products);
        }
        return getNotAvailableProducts();
    }

    public function getProductsByStorehouse() {
        return view('admin.report.productsbystorehouse');
    }

    public function postProductsByStorehouse(Request $request) {
        $storehouse_id = $request->storehouse_id;
        if ($storehouse_id != null && $storehouse_id != "") {
            $products = \App\Product::where('available_quantity', '>', 0)->where('storehouse_id', $storehouse_id)->get();
            return view('admin.report.productsbystorehouse')->with('products', $products);
        }
        return redirect()->back();
    }
    
    public function getPatientsByWard() {
        return view('admin.report.patientsbyward');
    }
    
    public function postPatientsByWard(Request $request) {
        $ward_id = $request->ward_id;
        if ($ward_id != null && $ward_id != "") {
            $ward = \App\Ward::find($ward_id);
            return view('admin.report.patientsbyward')->with('patients', $ward->patients);
        }
        return redirect()->back();
    }
}
