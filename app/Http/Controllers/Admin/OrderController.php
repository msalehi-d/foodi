<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id','DESC')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function accept(Order $order)
    {
        $order->status = config('constants.orderStatus.completed');
        $order->save();
        return back();
    }
    public function reject(Order $order)
    {
        $order->status = config('constants.orderStatus.cancelled');
        $order->save();
        return back();
    }
}
