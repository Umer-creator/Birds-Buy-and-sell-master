<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view("admin.order.orders", compact('orders'));
    }
    public function view_order($id)
    {
        $order = Order::find($id);
        return view("admin.order.view-order", compact('order'));
    }
}
