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
        return redirect(route('order.show'));
    }
    public function show()
    {
        $data['order'] = Order::where(['user_id' => auth()->user()->id, 'status' => config('constants.orderStatus.pending')])->with('items')->first();

        return view('order.show', $data);
    }

    public function update(Request $request, Order $order)
    {
        if($order->user_id != auth()->user()->id)
        {
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
            $item->item_price = $item->food->active_price;
            $item->quantity = $quantity[$id];
            if ($item->isDirty())
                $item->save();
        }
        return redirect(route('order.show'));
    }

    public function destroy()
    {
        # code...
    }
}
