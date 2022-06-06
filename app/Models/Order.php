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
    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case config('constants.orderStatus.cancelled'):
                return 'لغو شده';
            case config('constants.orderStatus.processing'):
                return 'در حال انجام';
            case config('constants.orderStatus.completed'):
                return 'تکمیل شده';
            case config('constants.orderStatus.pending'):
                return 'در انتظار';
        }
        return 'نامشخص';
    }
}
