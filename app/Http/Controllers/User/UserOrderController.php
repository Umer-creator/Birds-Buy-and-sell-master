<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view("user.order.orders", compact('orders'));
    }
    public function view_order($id)
    {
        $order = Order::find($id);
        return view("user.order.view-order", compact('order'));
    }

    public function confirmOrderShipping(Request $request)
    {
        $request->validate(
            [
                'shipping_confirmation' => 'required',
                'order_id' => 'required',
            ]
        );

        if ($request->shipping_confirmation == 1) {
            $order = Order::find($request->order_id);
            $order->shipping_confirmation = true;
            $order->order_status = true;
            $order->update();
        }
        return redirect()->back();
    }
}
