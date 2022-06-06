<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function add(Food $food)
    {
        if ($food->stock < 1) {
            return redirect()->back()->with('error', 'محصول مورد نظر تمام شده است');
        }
        $order = Order::firstOrCreate(['user_id' => auth()->user()->id, 'status' => config('constants.orderStatus.pending')]);

        $itemExist = OrderItem::where(['order_id' => $order->id, 'food_id' => $food->id])->exists();
        if (!$itemExist) {
            OrderItem::create(
                ['order_id' => $order->id, 'food_id' => $food->id, 'quantity' => 1, 'item_price' => $food->active_price]
            );
        }
        return redirect(route('customer.order.show'));
    }
    public function show()
    {
        $data['order'] = Order::where(['user_id' => auth()->user()->id, 'status' => config('constants.orderStatus.pending')])->with('items')->first();
        if (!$data['order']) {
            return redirect(route('home'));
        }
        return view('customer.order.show', $data);
    }

    public function update(Request $request, Order $order)
    {
        if ($order->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'شما مجوز انجام این کار را ندارید');
        }
        $allowedIds = $order->items->pluck('id');
        $quantity = $request->get('quantity');
        foreach ($request->get('items') as $id) {
            $item = OrderItem::find($id);
            if ($allowedIds->doesntContain($id))
                abort(403);
            if ($quantity[$id] == 0) {
                $item->delete();
                continue;
            }
            if ($quantity[$id] > $item->food->stock) {
                // return redirect()->back()->with('error', 'تعداد مورد نظر بیشتر از تعداد موجودی است');
                return back()->withErrors(['overAdd' => 'تعداد مورد نظر بیشتر از تعداد موجودی']);

            }
            $item->item_price = $item->food->active_price;
            $item->quantity = $quantity[$id];
            if ($item->isDirty())
                $item->save();
        }
        return redirect(route('customer.order.show'));
    }

    public function submit(Order $order)
    {
        foreach ($order->items as $items) {
            $food = Food::find($items->food_id);
            $food->stock = $food->stock - $items->quantity;
            $food->save();
        }
        $order->total_price = $order->total;
        $order->status = config('constants.orderStatus.processing');
        $order->save();
        return view('customer.order.success');
    }
}
