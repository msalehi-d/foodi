<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where(['user_id' => auth()->user()->id])->with('items')->orderBy('id', 'desc')->get();

        return view('customer.order.index', compact('orders'));
    }
}
