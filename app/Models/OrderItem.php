<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'food_id',
        'quantity',
        'item_price',
    ];

    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function getTotalAttribute()
    {
        $total = 0;
        $total += ($this->item_price * $this->quantity);
        return ($total);
    }
}
