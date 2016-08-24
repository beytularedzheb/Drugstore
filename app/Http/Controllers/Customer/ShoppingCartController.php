<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use Illuminate\Support\Facades\Session;
use App\WardOrder;
use App\WardOrderLine;

class ShoppingCartController extends Controller {

    public function getCartContent() {
        return view('customer.cart.index')
                        ->with('products', Cart::content())
                        ->with('total', Cart::total());
    }

    public function postAdd($productId) {
        $found = Cart::find($productId);

        $product = Product::find($productId);
        $quantity = 1;

        if ($found == NULL) {
            Cart::add($product->id, $product->name, 1, $product->unit_price_in_leva);
        } else {
            $quantity = $found->qty + 1;
            Cart::update($found->rowid, $quantity);
        }
        $message = trans('messages.product_in_cart', [
            'product_name' => $product->name,
            'quantity' => $quantity
        ]);
        Session::flash('flash_message', $message);

        return redirect()->back();
    }

    public function postRemove($productRowId) {
        $found = Cart::get($productRowId);
        if ($found != NULL) {
            Cart::remove($productRowId);
        }
        return redirect()->back();
    }

    public function postUpdateQuantityOf(Request $request, $productRowId) {
        $found = Cart::get($productRowId);
        if ($found != NULL) {
            $newQuantity = 0 + $request->input('qty');
            Cart::update($productRowId, $newQuantity);
        }

        $message = trans('messages.quantity_updated');
        Session::flash('flash_message', $message);

        return redirect()->back();
    }

    public function getDestroyCart() {
        Cart::destroy();
        return redirect()->back();
    }

    public function getCheckout() {
        if (Cart::content() == null || Cart::content()->count() == 0) {
            Session::flash('flash_msg_type', 'danger');
            Session::flash('flash_message', 'There are not any products in the cart!');
            
            return redirect()->action('Customer\ProductController@getIndex');
        }
        return view('customer.cart.checkout')
                        ->with('products', Cart::content())
                        ->with('total', Cart::total());
    }

    public function postSendOrder(Request $request) {

        $this->validate($request, [
            'receiver_name' => 'required|max:255',
            'pharmacy_id' => 'required|numeric|exists:pharmacies,id',
            'patient_id' => 'required|numeric|exists:patients,id',
        ]);

        $wardOrder = new WardOrder;
        $wardOrder->issue_date = \Carbon\Carbon::now();
        $wardOrder->receiver_name = $request->receiver_name;
        $wardOrder->requester_id = \App\Patient::find($request->patient_id)->ward_id;
        $wardOrder->requested_from_id = $request->pharmacy_id;
        $wardOrder->requested_for_id = $request->patient_id;
        $wardOrder->state = null;
        $wardOrder->save();

        foreach (Cart::content() as $orderLine) {
            $wardOrderLine = new WardOrderLine;
            $wardOrderLine->ward_order_id = $wardOrder->id;
            $wardOrderLine->product_id = $orderLine->id;
            $wardOrderLine->quantity = $orderLine->qty;
            $wardOrderLine->unit_price_in_leva = $orderLine->price;
            $wardOrderLine->save();
        }
        
        Cart::destroy();
        Session::flash('flash_message', trans('messages.orders_successfully_sent'));
        return redirect()->action('Customer\ProductController@getIndex');
    }

}
