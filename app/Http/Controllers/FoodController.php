<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{

    public function show(Food $food)
    {
        $data['food'] = $food;
        return view('food.show', $data);
    }

    public function category(category $category)
    {
        $data['category'] = $category;
        $data['foods'] = Food::where('category_id', $category->id)->paginate(16);
        return view('food.category', $data);
    }

}
