<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image)
            return $this->image;

        return config('app.asset_url') . '/images/no-image.png';
    }
    public function getActivePriceAttribute()
    {
        if ($this->sale_price)
            return $this->sale_price;

        return $this->regular_price;
    }
}
