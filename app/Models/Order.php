<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'status',
    ];
    use HasFactory;

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    public function getTotalAttribute()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->total;
        }
        return $total;
    }
}
