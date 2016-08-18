<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use Illuminate\Support\Facades\Session;

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
        Session::flash('added_product_message', $message);

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
        Session::flash('added_product_message', $message);

        return redirect()->back();
    }

    public function getDestroyCart() {
        Cart::destroy();
        return redirect()->back();
    }

}
