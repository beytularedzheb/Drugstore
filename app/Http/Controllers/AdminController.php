<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\WardOrder;

class AdminController extends Controller {

    public function index() {
        $new_orders_count = WardOrder::where('state', null)->count();
        return view('admin.index')->with('new_orders_count', $new_orders_count);
    }

    public function newOrders() {
        $orders = WardOrder::where('state', null)->get();
        return view('admin.app.neworders')->with('orders', $orders);
    }

    public function updateSenderName(Request $request, $order_id) {
        $this->validate($request, [
            'sender_name' => 'required',
        ]);

        $order = WardOrder::find($order_id);
        $order->sender_name = $request->sender_name;
        $order->save();
        Session::flash('flash_message', trans('messages.sender_updated'));

        return redirect()->back();
    }

    public function confirmOrder($order_id) {
        $order = WardOrder::find($order_id);

        foreach ($order->orderLines as $orderLine) {
            if ($orderLine->product->available_quantity == 0 || $orderLine->product->available_quantity < $orderLine->quantity) {
                Session::flash('flash_message', trans('messages.not_available_quantity', ['product' => $orderLine->product->name]));
                return redirect()->back();
            }
        }

        foreach ($order->orderLines as $orderLine) {
            $product = $orderLine->product;
            $product->available_quantity -= $orderLine->quantity;
            $product->save();
        }
        $order->state = 'confirmed';
        $order->save();

        return redirect()->back();
    }

    public function rejectOrder($order_id) {
        $order = WardOrder::find($order_id);
        $order->state = 'rejected';
        $order->save();

        return redirect()->back();
    }

}
