<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;

class SellerOrderController extends Controller
{
    public function orders()
    {
        $sellerId = Auth::user()->id;
        $orders = Order::whereHas('store', function ($query) use ($sellerId) {
            $query->where('seller_id', $sellerId);
        })->get();



        return view("seller.order.seller-view-orders", compact('orders'));
    }

    public function view_order($id)
    {
        $order = Order::find($id);
        return view("seller.order.view-order", compact('order'));
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
            $order->shipping_status = true;
            $order->update();
        }
        return redirect()->back();
    }
}
